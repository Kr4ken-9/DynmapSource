using System.Collections.Generic;
using Rocket.API;
using Rocket.Unturned.Chat;

namespace dynmap.core
{
    public class CommandSyncInterval : IRocketCommand
    {
        
        public AllowedCaller AllowedCaller => AllowedCaller.Both;

        public string Name => "syncinterval";

        public string Help => "Changes syncinterval while running.";

        public List<string> Aliases => new List<string>() { "syncint" };

        public string Syntax => "/syncint <Interval>";

        public List<string> Permissions => new List<string>() { "syncinterval" };

        public void Execute(IRocketPlayer caller, string[] command)
        {
            int Number;
            if (command.Length == 1 && int.TryParse(command[0], out Number))
            {
                if (int.Parse(command[0]) != Dynmap.Instance.Configuration.Instance.syncInterval)
                {
                    Dynmap.Instance.Configuration.Instance.syncInterval = int.Parse(command[0]);
                    Dynmap.Instance.myTimer.Interval = Dynmap.Instance.Configuration.Instance.syncInterval;
                    UnturnedChat.Say(caller, "Sync Interval is now " + command[0]);
                }
                else
                    UnturnedChat.Say(caller, "Sync Interval is already " + command[0]);
            }
            else
            {
               /* if(command[0] == "workshop")
                {
                    //Rocket.Core.Logging.Logger.Log(SDG.Unturned.Provider.currentServerInfo.);
                    Rocket.Core.Logging.Logger.Log();
                }*/
                //Rocket.Core.Logging.Logger(SDG.Unturned.Player.player.name)
                UnturnedChat.Say(caller, command[0] + " is not a number");
            }

            //throw new NotImplementedException();
        }
    }
}