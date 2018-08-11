/**
 * @version 1.0
 * @author jc13342
 */
package move;

/**
 * Creates the game that the UI runs
 */
public class Game {

    /**
     * Grid to hold all rooms
     */
    private final Room[][] MAP = new Room[6][5];
    
    /**
     * Horizontal position of player
     */
    private int xPosition = 0;
    
    /**
     * Vertical position of player
     */
    private int yPosition = 0;
    
    /**
     * Number of turns taken in current game
     */
    private int turns = 0;
    
    /**
     * Current room of player
     */
    private Room room;
    
    /**
     * Specified end room
     */
    private Room end;
    
    /**
     * Specified pickaxe head room
     */
    private Room pickaxeHead;
    
    /**
     * Specified pickaxe handle room
     */
    private Room pickaxeHandle;

    /**
     * Creates new Game
     */
    public Game() {
        // Create map
        setMap();
        // Set starting room
        setRoom();
    }

    /**
     * Sets up the map and special rooms for the game
     */
    private void setMap() {
        // Set each room in its position, with connetions.
        MAP[0][0] = new Room( "Starting Cell", false, true, true, false );
        MAP[0][1] = new Room( "Rail Cell 1", false, true, false, true );
        MAP[1][0] = new Room( "Equipment Room", true, false, true, false );
        MAP[1][1] = new Room( "Rail Cell 2", true, true, false, true );
        MAP[2][1] = new Room( "Rail Cell 3", true, true, true, false );
        MAP[2][2] = new Room( "Rail Connercter Cell", false, false, true, true );
        MAP[2][3] = new Room( "Old Rail Cell 1", false, true, true, true );
        MAP[2][4] = new Room( "Old Mine Cell", false, false, false, true );
        MAP[3][1] = new Room( "Rail Cell 4", true, true, false, false );
        MAP[3][3] = new Room( "Old Rail Cell 2", true, true, false, false );
        MAP[3][4] = new Room( "New Mine Cell 2", false, true, false, false );
        MAP[4][0] = new Room( "Tight Corner 1", false, true, true, false );
        MAP[4][1] = new Room( "Rail Cell 5", true, false, false, true );
        MAP[4][2] = new Room( "Tight Corner 2", false, true, true, false );
        MAP[4][3] = new Room( "Old Rail Cell 3", true, true, true, true );
        MAP[4][4] = new Room( "New Mine Cell 1", true, false, false, true );
        MAP[5][0] = new Room( "Rubbish Deposit", true, false, false, false );
        MAP[5][2] = new Room( "Old Gold Stash", true, false, false, false );
        MAP[5][3] = new Room( "Old Rail Cell 4", true, false, false, false );
        MAP[5][4] = new Room( "End Cell", false, false, false, false );

        // Set end and pickaxe rooms in their locations
        end = MAP[5][4];
        pickaxeHead = MAP[1][0];
        pickaxeHandle = MAP[5][0];

        // Set the attributes of end and pickaxe rooms
        end.setEnd();
        pickaxeHead.setPickaxeHead( true );
        pickaxeHandle.setPickaxeHandle( true );
    }

    /**
     * Sets the current room in it's position
     */
    private void setRoom() {
        room = MAP[yPosition][xPosition];
    }

    /**
     * Allows for changes to pickaxe head, before and after entry to room
     *
     * @param pickaxeHead
     */
    public void setPickaxeHead( boolean pickaxeHead ) {
        // Used in UI for ease of changes to the room
        this.pickaxeHead.setPickaxeHead( pickaxeHead );
    }

    /**
     * Allows for changes to pickaxe handle, before and after entry to room
     *
     * @param pickaxeHandle
     */
    public void setPickaxeHandle( boolean pickaxeHandle ) {
        // Used in UI for ease of changes to the room
        this.pickaxeHandle.setPickaxeHandle( pickaxeHandle );
    }

    /**
     * Gets the current room's attributes
     *
     * @return Current occupied room
     */
    public Room getRoom() {
        return room;
    }

    /**
     * Moves the player on the map
     *
     * @param direction
     */
    public void move( char direction ) {
        // Increment number of turns by 1
        turns++;
        // Check direction moved
        switch( direction ) {
            // Update x and y positions
            case 'N':
                yPosition--;
                break;
            case 'S':
                yPosition++;
                break;
            case 'E':
                xPosition++;
                break;
            case 'W':
                xPosition--;
                break;
        }
        // Set new room
        setRoom();
    }

    /**
     * Resets to beginning game state
     */
    public void restart() {
        // Sets position to starting room
        xPosition = 0;
        yPosition = 0;
        // Resets the turns
        turns = 0;
        // Sets beginning room
        setRoom();
    }

    /**
     * Gets the number of turns taken
     *
     * @return turns taken since beginning
     */
    public int getTurns() {
        return turns;
    }
}
