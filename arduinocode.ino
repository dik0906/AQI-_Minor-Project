#include <ESP8266WiFi.h>
const char* ssid     = "Pixel 2";
const char* password = "pixel7877";
const char* host = "http://srmaqi.000webhostapp.com";
const char* host_get = "srmaqi.000webhostapp.com";
void setup() {
  Serial.begin(115200);
  delay(100);
   Serial.println();
  Serial.println();
  Serial.print("Connecting to ");
  Serial.println(ssid);
  
  WiFi.begin(ssid, password); 
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
 
  Serial.println("");
  Serial.println("WiFi connected");  
  Serial.println("IP address: ");
  Serial.println(WiFi.localIP());
  Serial.print("Netmask: ");
  Serial.println(WiFi.subnetMask());
  Serial.print("Gateway: ");
  Serial.println(WiFi.gatewayIP());
}
void loop() {
  float h=13.14;
  // Read temperature as Celsius (the default)
  if (isnan(h)) {
    Serial.println("lodu galat dala value dali h");
    return;
  }

  Serial.print("connecting to ");
  Serial.println(host);

  WiFiClient client;
  const int httpPort = 80;
  if (!client.connect(host, httpPort)) {
    Serial.println("connection failed");
    return;
  }
  
  String url = "/api/weather/insert.php?hum=" + String(h);
  Serial.print("Requesting URL: ");
  Serial.println(url);
  
  client.print(String("GET ") + url + " HTTP/1.1\r\n" +
               "Host: " + host_get + "\r\n" + 
               "Connection: close\r\n\r\n");
  delay(500);
  
  while(client.available()){
    String line = client.readStringUntil('\r');
    Serial.print(line);
   
  }
  
  Serial.println();
  Serial.println("closing connection");
  delay(3000);
}
