<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Brightbuddy Chatbot</title>
  <link rel="stylesheet" href="style.css">
  <meta http-equiv="Content-Security-Policy" content="default-src 'self'; style-src 'self' 'unsafe-inline'; script-src 'self' 'unsafe-inline'; img-src 'self' data:;">
</head>
<body>

  <!-- Floating chat toggle button -->
  <div id="chat-toggle" class="chat-toggle">💬</div>

  <!-- Chatbox wrapper -->
  <div id="chat-wrapper" class="chat-wrapper hidden">
    <div class="chat-header">
      <span>Brightbuddy</span>
      <span id="chat-close" class="chat-close">✖</span>
    </div>

    <!-- Chat content -->
    <div class="chat-container">
      <div class="chatbox" id="chatbox">
        <div class="message bot-message">
          <strong>Chatbot:</strong> Hallo ik ben Brightbuddy, waar kan ik je vandaag mee helpen?
        </div>
      </div>

      <!-- User input -->
      <div class="user-input">
        <input type="text" id="user-input" class="input-field" placeholder="Type your question here..." />
        <button class="button" onclick="sendQuestion()">Send</button>
      </div>
    </div>
  </div>

  <script src="chatbot.js"></script>
</body>
</html>
