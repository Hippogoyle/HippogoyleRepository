//
// breakout.c
//
// Computer Science 50
// Problem Set 3
//

// by Jerry Johnson  @ edx.org a.k.a. BlenderFish

// standard libraries
#define _XOPEN_SOURCE
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <time.h>

// Stanford Portable Library
#include <spl/gevents.h>
#include <spl/gobjects.h>
#include <spl/gwindow.h>

// height and width of game's window in pixels
#define HEIGHT 600
#define WIDTH 400

// number of rows of bricks
#define ROWS 5

// number of columns of bricks
#define COLS 10

// radius of ball in pixels
#define RADIUS 10

// lives
#define LIVES 3

// paddle width
#define PADDLE 40

// brick spacing
#define SPACE 6

// prototypes
void initBricks(GWindow window);
GOval initBall(GWindow window);
GRect initPaddle(GWindow window);
GLabel initScoreboard(GWindow window);
void updateScoreboard(GWindow window, GLabel label, int points);
GObject detectCollision(GWindow window, GOval ball);

int main(void)
{
    // seed pseudorandom number generator
    srand48(time(NULL));

    // instantiate window
    GWindow window = newGWindow(WIDTH, HEIGHT);

    // instantiate bricks
    initBricks(window);

    // instantiate ball, centered in middle of window
    GOval ball = initBall(window);

    // instantiate paddle, centered at bottom of window
    GRect paddle = initPaddle(window);

    // instantiate scoreboard, centered in middle of window, just above ball
    GLabel label = initScoreboard(window);

    // number of lives initially
    int lives = LIVES;

    // number of points initially
    int points = 0;
    
    // number of bricks initially
    int bricks = COLS * ROWS - points;
    
    // initial velocity
    srand48(time(NULL));
    double xvelocity = 2.0;
    double yvelocity = (1 + drand48()) * 2;
    
        
    // keep playing until game over
    while (lives > 0 && bricks > 0)
    {
        // move ball along x & y
        move(ball, xvelocity, yvelocity);
        
        // bounce off right edge of window
        if (getX(ball) + getWidth(ball) >= getWidth(window))
        {
            xvelocity = -xvelocity;
        }        
        
        // bounce off left edge of window
        if (getX(ball) <= 0)
        {
            xvelocity = -xvelocity;
        }
        
        // ball out of bounds
        if (getY(ball) + getHeight(ball) >= getHeight(window))
        {
            removeGWindow(window, ball);
            lives--;
            ball = newGOval(WIDTH / 2 - RADIUS, HEIGHT / 2 - RADIUS,
             RADIUS * 2, RADIUS * 2);
            setColor(ball, "RED");
            setFilled(ball, true);
            add(window, ball);
            pause(1800);
            setColor(ball, "BLACK");
            setFilled(ball, true);
        }
        
        // bounce off top
        if (getY(ball) <= 0)
        {
            yvelocity = -yvelocity;
        }
        
        
        // linger before moving again
        pause (10);
        // check for mouse event
        GEvent event = getNextEvent(MOUSE_EVENT);
        
        // if we heard event
        if (event != NULL)
        {
            // if the event was a movement
            if (getEventType(event) == MOUSE_MOVED)
            {
                // ensure the paddle follows mouse
                double x = getX(event) - getWidth(paddle) / 2;
                setLocation(paddle, x, HEIGHT * .92);
            }
        }
        
        // ball paddle collision
        GObject object = detectCollision(window, ball);
        
        if (object == paddle)
        {
            yvelocity = -yvelocity;
        }
        
        else if (object == label)
        {
            ;
        }
        else if (object != NULL)
        {
            // xvelocity = -xvelocity;
            yvelocity = -yvelocity;
            removeGWindow(window, object);
            points++;
            updateScoreboard(window, label, points);
        }
    }
    
    // wait for click before exiting
    waitForClick();

    // game over
    closeGWindow(window);
    return 0;
}

/**
 * Initializes window with a grid of bricks.
 */
void initBricks(GWindow window)
{
    // somewhere else ask user for number of blocks per row with slider perhaps? then calcualte even spaces
    for (int row = 0; row < ROWS; row++)
    {
        for(int column = 0; column < COLS; column++)
        {
            // location of individual bricks
            GRect(brick)= newGRect(SPACE / 2 + column * WIDTH / COLS, 
            (row + 2) * (HEIGHT / (ROWS + SPACE)) / ROWS,
            
            // size of bricks 
            WIDTH / COLS - SPACE, (HEIGHT / (ROWS + SPACE)) / ROWS - SPACE);
            
            // color bricks by row 
            switch (row % 3)
            {
                case 0:
                    setColor(brick, "GREEN");
                    setFilled(brick, true);
                    break;
                case 1:
                    setColor(brick, "GRAY");
                    setFilled(brick, true);
                    break;
                case 2:
                    setColor(brick, "YELLOW");
                    setFilled(brick, true);
                    break;
            }
            add(window, brick);
        }
    }
}

/**
 * Instantiates ball in center of window.  Returns ball.
 */
GOval initBall(GWindow window)
{
    GOval ball = newGOval(WIDTH / 2 - RADIUS, HEIGHT / 2 - RADIUS, RADIUS * 2, RADIUS * 2);
    setColor(ball, "BLACK");
    setFilled(ball, true);

    add(window, ball);

    return ball;
}

/**
 * Instantiates paddle in bottom-middle of window.
 */
GRect initPaddle(GWindow window)
{
    // make paddle
    GRect paddle = newGRect(WIDTH / 2 - PADDLE / 2, HEIGHT * .95, PADDLE, PADDLE / 5);
    setColor(paddle, "BLACK");
    setFilled(paddle, true);
    
    // place paddle in window
    add(window,  paddle);
		
    return paddle;

}

/**
 * Instantiates, configures, and returns label for scoreboard.
 */
GLabel initScoreboard(GWindow window)
{
    GLabel label = newGLabel("Score: 0");
    setColor(label, "BLACK");
    setLocation(label, WIDTH / 2 - getWidth(label) / 2, HEIGHT * .33);
    add(window, label);
    
    return label;
}

/**
 * Updates scoreboard's label, keeping it centered in window.
 */
void updateScoreboard(GWindow window, GLabel label, int points)
{
    // update label
    char s[12];
    sprintf(s, "Score: %i", points);
    setLabel(label, s);
    setColor(label, "BLACK");

    // center label in window
    setLocation(label, (WIDTH - getWidth(label)) / 2, HEIGHT * .33);
   
}

/**
 * Detects whether ball has collided with some object in window
 * by checking the four corners of its bounding box (which are
 * outside the ball's GOval, and so the ball can't collide with
 * itself).  Returns object if so, else NULL.
 */
GObject detectCollision(GWindow window, GOval ball)
{
    // ball's location
    double x = getX(ball);
    double y = getY(ball);

    // for checking for collisions
    GObject object;

    // check for collision at ball's top-left corner
    object = getGObjectAt(window, x, y);
    if (object != NULL)
    {
        return object;
    }

    // check for collision at ball's top-right corner
    object = getGObjectAt(window, x + 2 * RADIUS, y);
    if (object != NULL)
    {
        return object;
    }

    // check for collision at ball's bottom-left corner
    object = getGObjectAt(window, x, y + 2 * RADIUS);
    if (object != NULL)
    {
        return object;
    }

    // check for collision at ball's bottom-right corner
    object = getGObjectAt(window, x + 2 * RADIUS, y + 2 * RADIUS);
    if (object != NULL)
    {
        return object;
    }

    // no collision
    return NULL;
}
