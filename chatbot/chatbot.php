<!-- public/chatbot/chatbot.php -->

<!-- Chatbot Styles -->
<link rel="stylesheet" href="<?= BASE_URL ?>chatbot/chatbot.css">

<!-- Floating chat toggle button -->
<div id="chat-toggle" class="chat-toggle">
  <img src="<?= BASE_URL ?>images/Brightbuddy-icon.svg" alt="Chat icon">
</div>

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
  </div>
</div>

<!-- Chatbot logic -->
<script src="<?= BASE_URL ?>chatbot/chatbot.js"></script>
