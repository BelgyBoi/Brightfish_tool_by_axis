// Chatbot with Static Topic Buttons

const topics = {
  premium: {
    text: "💎 Premium posities geven je advertentie meer zichtbaarheid. Silver, Gold en Titanium zijn de drie mogelijkheden, elk met hun voordelen.",
    buttons: [
      { text: "Wat is Silver?", action: "go_silver" },
      { text: "Wat is Gold?", action: "go_gold" },
      { text: "Wat is Titanium?", action: "go_titanium" }
    ]
  },
  silver: {
    text: "🥈 Silver is de voorlaatste advertentie in de ad reel. Net voor Gold dus—een strategisch sterke plek tegen een kleine meerprijs.",
    buttons: [
      { text: "Wat wordt er bedoeld met de ad reel?", action: "go_reel" },
      { text: "Wat is Gold?", action: "go_gold" }
    ]
  },
  gold: {
    text: "🥇 Gold is de laatste advertentie vóór de jingle. Je advertentie sluit het hoofdblok af. Dat geeft veel aandacht net voor het pauzemoment.",
    buttons: [
      { text: "Wat is Titanium?", action: "go_titanium" },
      { text: "Wat word er bedoelt met de Brightfish jingle?", action: "go_jingle" }
    ]
  },
  titanium: {
    text: "🚀 Titanium wordt getoond ná de jingle en vlak vóór de trailers. Het publiek zit dan al klaar, dus maximale zichtbaarheid gegarandeerd.",
    buttons: [
      { text: "In welke volgorde worden de advertenties afgespeeld?", action: "go_timeline" },
      { text: "Waarom kost het meer?", action: "go_cost" }
    ]
  },
  reel: {
    text: "📦 De ad reel is een blok van 10–13 minuten advertenties voor de film. Silver en Gold zijn de laatste slots binnen dit blok.",
    buttons: [
      { text: "Wat komt na de reel?", action: "go_titanium" },
      { text: "Wat word er bedoelt met de Brightfish jingle?", action: "go_jingle" }
    ]
  },
  jingle: {
    text: "🔔 De jingle speelt twee keer: één keer vóór de ad reel en nog eens voor Titanium. Het markeert de overgang naar trailers of film.",
    buttons: [
      { text: "Wat komt er na de jingle?", action: "go_titanium" },
      { text: "In welke volgorde worden de advertenties afgespeeld?", action: "go_timeline" }
    ]
  },
  cost: {
    text: "💰 Premium posities kosten meer door hun strategische plaatsing. Meer zichtbaarheid = meer impact, dus logischerwijs een hogere prijs.",
    buttons: [
      { text: "Wat krijg ik ervoor terug?", action: "go_benefits" },
      { text: "In welke volgorde worden de advertenties afgespeeld?", action: "go_timeline" }
    ]
  },
  benefits: {
    text: "📈 Meer zichtbaarheid zorgt voor meer impact, merkherkenning en hogere ROI. Titanium scoort hier het best.",
    buttons: [
      { text: "Wat is Titanium?", action: "go_titanium" },
      { text: "Wat is Silver?", action: "go_silver" }
    ]
  },
  timeline: {
    text: "🕒 Tijdlijn: [Jingle] > [Standaard ad reel] > [Premium ad reel: Silver & Gold] > [Jingle] > [Premium slot: Titanium] > [Trailers] > [Film].",
    buttons: [
      { text: "Wat wordt er bedoeld met de ad reel?", action: "go_reel" },
      { text: "Wat is premium?", action: "go_premium" }
    ]
  }
};

function sendQuestionFromBot(topicKey) {
  const topic = topics[topicKey] || topics.fallback;
  const chatbox = document.getElementById('chatbox');

  // 1. Show typing animation immediately
  const typingIndicator1 = document.createElement('div');
  typingIndicator1.className = 'message bot-message typing-indicator';
  typingIndicator1.innerHTML = `
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
  `;
  chatbox.appendChild(typingIndicator1);
  chatbox.scrollTop = chatbox.scrollHeight;

  // 2. After short delay, show main message
  setTimeout(() => {
    typingIndicator1.remove();

    const botMsg = document.createElement('div');
    botMsg.className = 'message bot-message';
    botMsg.textContent = topic.text;
    chatbox.appendChild(botMsg);
    chatbox.scrollTop = chatbox.scrollHeight;

    // 3. Wait 5 seconds before follow-up
    setTimeout(() => {
      // 4. Second typing animation
      const typingIndicator2 = document.createElement('div');
      typingIndicator2.className = 'message bot-message typing-indicator';
      typingIndicator2.innerHTML = `
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
      `;
      chatbox.appendChild(typingIndicator2);
      chatbox.scrollTop = chatbox.scrollHeight;

      // 5. After 2s, remove typing and show follow-up + buttons
      setTimeout(() => {
        typingIndicator2.remove();

        const followUp = document.createElement('div');
        followUp.className = 'message bot-message';
        followUp.textContent = "Kan ik je bij nog iets helpen?";
        chatbox.appendChild(followUp);

        if (topic.buttons) {
          createButtons(topic.buttons, chatbox);
        }

        chatbox.scrollTop = chatbox.scrollHeight;
      }, 2000);
    }, 2000);
  }, 1500); // Initial "thinking" delay before main response
}

function createButtons(buttons, chatbox) {
  const container = document.createElement('div');
  container.classList.add('button-container');

  buttons.forEach(button => {
    const el = document.createElement('button');
    el.classList.add('button');
    el.textContent = button.text;
    el.onclick = () => {
      container.remove();
      const msg = document.createElement('div');
      msg.className = 'message user-message';
      msg.textContent = button.text;
      chatbox.appendChild(msg);
      sendQuestionFromBot(button.action.replace('go_', ''));
    };
    container.appendChild(el);
  });

  chatbox.appendChild(container);
}

document.getElementById('chat-toggle').addEventListener('click', () => {
  const chatWrapper = document.getElementById('chat-wrapper');
  const chatbox = document.getElementById('chatbox');

  const isHidden = chatWrapper.classList.contains('hidden');
  chatWrapper.classList.toggle('hidden');
document.getElementById('chat-close').addEventListener('click', () => {
  document.getElementById('chat-wrapper').classList.add('hidden');
});

  if (isHidden && chatbox.childElementCount === 0) {
    const greeting = document.createElement('div');
    greeting.className = 'message bot-message';
    greeting.innerHTML = "<strong>Chatbot:</strong> Hallo ik ben Brightbuddy, waar kan ik je vandaag mee helpen?";
    chatbox.appendChild(greeting);

    createButtons([
      { text: "Wat zijn premium posities?", action: "go_premium" },
      { text: "Wat wordt er bedoeld met de ad reel?", action: "go_reel" },
      { text: "Wat word er bedoelt met de Brightfish jingle?", action: "go_jingle" },
      { text: "In welke volgorde worden de advertenties afgespeeld?", action: "go_timeline" }
    ], chatbox);
  }
});

