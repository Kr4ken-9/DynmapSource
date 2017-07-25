using Rocket.API;

namespace dynmap.core
{
    public class DynmapConfiguration : IRocketPluginConfiguration
    {
        //Konfigurační soubor
        public string PrivateKey;
        public int syncInterval;
        public string WebCoreAddress;
        public bool displayInChat;
        public bool displayIfVanish;

        public void LoadDefaults()
        {
            PrivateKey = "MySecretPrivateKey";
            syncInterval = 5000;
            WebCoreAddress = "http://localhost";
            displayInChat = false;
            displayIfVanish = false;

        }
    }
}