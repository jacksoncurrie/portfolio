using System;

namespace RoomEscape
{
    class RoomEscape
    {
        static void Main(string[] args)
        {
            // Game instructions
            Console.WriteLine("\nWelcome to Room Escape!");
            Console.WriteLine("-----------------------");
            Console.WriteLine("\nTo play this game use the arrow keys to move. You can press the [Esc] button to exit.");
            Console.WriteLine("You must find the key before you go to the exit and win the game.");
            Console.Write("\nPress any key to start...");
            Console.ReadKey();
            Console.Clear();

            // Sart new game
            Game game = new Game();

            // Loop until game is complete
            do
            {
                game.DisplayRoom();

                // Get input
                ConsoleKeyInfo key = Console.ReadKey(true);

                switch (key.Key)
                {
                    // Up arrow
                    case ConsoleKey.UpArrow:
                        game.Move('N');
                        break;

                    // Down arrow
                    case ConsoleKey.DownArrow:
                        game.Move('S');
                        break;

                    // Right arrow
                    case ConsoleKey.RightArrow:
                        game.Move('E');
                        break;

                    // Left arrow
                    case ConsoleKey.LeftArrow:
                        game.Move('W');
                        break;
                    
                    // Escape
                    case ConsoleKey.Escape:
                        Console.Clear();
                        Console.WriteLine("\n========");
                        Console.WriteLine("Goodbye!");
                        Console.WriteLine("========");
                        Console.Write("\nPress any key to close...");
                        Console.ReadKey();
                        return;

                    // Wrong input
                    default:
                        Console.Clear();
                        break;
                }
            }
            while (!game.Finish);

            // End program
            Console.Write("\nPress any key to close...");
            Console.ReadKey();
        }
    }
}
