#include <SPI.h>
#include <MFRC522.h>

#include <ArduinoHttpClient.h>
#include <WiFi.h>

#define RST_PIN         22         
#define SS_PIN          21         

String strID, val;
String postData;

MFRC522 mfrc522(SS_PIN, RST_PIN);

char ssid[] = "SSID";
char pass[] = "PASSWORD";

char serverAddress[] = "192.168.3.21";
int port = 80;

WiFiClient wifi;
HttpClient client = HttpClient(wifi, serverAddress, port);

void setup() {
  Serial.begin(115200);
  SPI.begin(); 
  WiFi.begin(ssid, pass);
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  mfrc522.PCD_Init();
  delay(4); 
  mfrc522.PCD_DumpVersionToSerial();
  Serial.println("");
  Serial.println("WiFi connected");
  Serial.println("IP Address");
  Serial.println(WiFi.localIP());

}

void loop() {
  getID();
}

void getID() {

  if ( ! mfrc522.PICC_IsNewCardPresent()) {
    return;
  }

  if ( ! mfrc522.PICC_ReadCardSerial()) {
    return;
  }

  strID = "";
  for ( byte i = 0; i < 4; i++) {
    strID += String(mfrc522.uid.uidByte[i], HEX);
  }
  strID.toUpperCase();
  Serial.print("Tap card key: ");
  Serial.println(strID);
  val = "500";
  
  sendData();
  
  mfrc522.PICC_HaltA();
  return;
}

void sendData() {
  Serial.println("making POST request");
  String contentType = "application/json";
  //String postData = "{\"idcard\":\"1\",\"idnfc\":\"1102KIK19\",\"nis_siswa\":\"0001\"}";
  postData = "{\"idnfc\":\"";
  postData += strID;
  postData += "\"}";

  client.post("/newCobaRest/kontak", contentType, postData);

  Serial.println(postData);

  int statusCode = client.responseStatusCode();
  String response = client.responseBody();

  Serial.print("Status code: ");
  Serial.println(statusCode);
  Serial.print("Response: ");
  Serial.println(response);
}
