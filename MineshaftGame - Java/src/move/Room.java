/**
 * @version 1.0
 * @author jc13342
 */
package move;

/**
 * Creates the rooms used in the games map
 */
public class Room {

    /**
     * Name of them room
     */
    private final String name;
    
    /**
     * If connection north
     */
    private final boolean north;
    
    /**
     * If connection south
     */
    private final boolean south;
    
    /**
     * If connection east
     */
    private final boolean east;
    
    /**
     * If connection west
     */
    private final boolean west;
    
    /**
     * If pickaxe head containing room
     */
    private boolean pickaxeHead = false;
    
    /**
     * If pickaxe handle containing room
     */
    private boolean pickaxeHandle = false;
    
    /**
     * If end room
     */
    private boolean end = false;

    /**
     * Creates new room
     * @param name Name of the room
     * @param north If connection north
     * @param south If connection south
     * @param east If connection east
     * @param west If connection west
     */
    public Room( String name, boolean north, boolean south, boolean east, boolean west ) {
        // Sets name and connections provided when creating map
        this.name = name;
        this.north = north;
        this.south = south;
        this.east = east;
        this.west = west;
    }

    /**
     * Sets the room containing the pickaxe head
     * @param pickaxeHead 
     */
    public void setPickaxeHead( boolean pickaxeHead ) {
        // Sets new value
        this.pickaxeHead = pickaxeHead;
    }
    
    /**
     * Sets the room containing the pickaxe handle
     * @param pickaxeHandle 
     */
    public void setPickaxeHandle( boolean pickaxeHandle ) {
        // Sets new value
        this.pickaxeHandle = pickaxeHandle;
    }
    
    /**
     * Sets the end room
     */
    public void setEnd(){
        // Sets to true, as doesn't change
        end = true;
    }

    /**
     * Gets Name of the room
     * @return Name of the room
     */
    public String getName() {
        return name;
    }
    
    /**
     * Checks if specified pickaxe head containing room
     * @return If pickaxe head containing room
     */
    public boolean isPickaxeHead() {
        return pickaxeHead;
    }
    
    /**
     * Checks if specified pickaxe handle containing room
     * @return If pickaxe handle containing room
     */
    public boolean isPickaxeHandle() {
        return pickaxeHandle;
    }

    /**
     * Checks if specified connection north
     * @return if connection north
     */
    public boolean isNorth() {
        return north;
    }

    /**
     * Checks if specified connection south
     * @return If connection south
     */
    public boolean isSouth() {
        return south;
    }

    /**
     * Checks if specified connection east
     * @return If connection east
     */
    public boolean isEast() {
        return east;
    }

    /**
     * Checks if specified connection west
     * @return If connection west
     */
    public boolean isWest() {
        return west;
    }
    
    /**
     * Checks if specified end room
     * @return If end room
     */
    public boolean isEnd() {
        return end;
    }
}