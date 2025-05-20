<<<<<<< Updated upstream
// Chatbot with Static Topic Buttons
const startOptions = [
  { text: "Ik vraag me af wat Premium is?", action: "go_premium" },
  // Client can enable these by removing the comments:
  // { text: "vul hier de vraagtitel in", action: "go_xyz" },
  // { text: "vul hier de vraagtitel in", action: "go_xyz" }
];

const topics = {
  fallback: {
    text: "Geen probleem! Kies een onderwerp om meer over te weten te komen.",
    buttons: startOptions
  },
  premium: {
    text: "💎 Premium posities zorgen voor extra zichtbaarheid van je advertentie. Er zijn drie opties: Silver, Gold en Titanium. Ze zitten op strategische plekken in de tijdlijn en geven je meer impact — tegen een iets hogere prijs.",
    buttons: [
      { text: "Wat is Silver?", action: "go_silver" },
      { text: "Wat is Gold?", action: "go_gold" },
      { text: "Wat is Titanium?", action: "go_titanium" },
      { text: "Hoe ziet de tijdlijn eruit?", action: "go_timeline" },
      { text: "Waarom kosten ze meer?", action: "go_cost" },
      { text: "Wat krijg ik ervoor terug?", action: "go_benefits" }
    ]
  },
  silver: {
    text: "🥈 Silver is de voorlaatste advertentie in de ad reel. Net voor Gold dus — een strategisch sterke plek. 🎯 Gemiddeld kijkt 70–80% van de zaal actief mee op dit moment. Een slimme keuze voor een kleine meerprijs.",
    buttons: [
      { text: "Wat is Gold?", action: "go_gold" },
      { text: "Wat is Titanium?", action: "go_titanium" },
      { text: "Wat betekent premium?", action: "go_premium" },
      { text: "Wat is de ad reel?", action: "go_reel" }
    ]
  },
  gold: {
    text: "🥇 Gold is de laatste advertentie vóór de jingle. Je advertentie sluit het hoofdblok af, net voor het pauzemoment. 🧠 Ongeveer 85–90% van de zaal kijkt dan actief mee — een van de sterkste posities qua impact.",
    buttons: [
      { text: "Wat is Titanium?", action: "go_titanium" },
      { text: "Wat betekent de jingle?", action: "go_jingle" },
      { text: "Waarom kost het meer?", action: "go_cost" },
      { text: "Wat krijg ik ervoor terug?", action: "go_benefits" },
      { text: "Wat betekent premium?", action: "go_premium" }
    ]
  },
  titanium: {
    text: "🚀 Titanium wordt getoond ná de jingle en vlak vóór de trailers. Het publiek zit dan al klaar, dus maximale zichtbaarheid gegarandeerd. 👁️ Ongeveer 95–100% van de zaal kijkt mee — de allersterkste positie voor impact.",
    buttons: [
      { text: "Hoe ziet de tijdlijn eruit?", action: "go_timeline" },
      { text: "Waarom kost het meer?", action: "go_cost" },
      { text: "Wat krijg ik ervoor terug?", action: "go_benefits" },
      { text: "Wat is Gold?", action: "go_gold" },
      { text: "Wat betekent premium?", action: "go_premium" }
    ]
  },
  reel: {
    text: "📦 De ad reel is een blok van 10–13 minuten advertenties vóór de film. Silver en Gold zijn de laatste plekken in deze reel. 🚫 Titanium zit niet in de ad reel — die wordt apart getoond, ná de jingle en vóór de trailers.",
    buttons: [
      { text: "Wat is Silver?", action: "go_silver" },
      { text: "Wat is Gold?", action: "go_gold" },
      { text: "Wat is Titanium?", action: "go_titanium" },
      { text: "Hoe ziet de tijdlijn eruit?", action: "go_timeline" },
      { text: "Wat betekent premium?", action: "go_premium" }
    ]
  },
  jingle: {
    text: "🔔 De jingle speelt twee keer: één keer vóór de ad reel en nog eens voor Titanium. Het markeert de overgang naar trailers of film.",
    buttons: [
      { text: "Wat is Titanium?", action: "go_titanium" },
      { text: "Wat is de ad reel?", action: "go_reel" },
      { text: "Hoe ziet de tijdlijn eruit?", action: "go_timeline" },
      { text: "Wat betekent premium?", action: "go_premium" }
    ]
  },
  cost: {
    text: "💰 De meerprijs hangt af van je campagne. Richtlijn: Silver kost ongeveer 10–15% meer dan een standaardpositie, Gold 25–30%, en Titanium zelfs 50–60% extra. Hoe strategischer de plek, hoe groter de impact én het prijskaartje.",
    buttons: [
      { text: "Wat krijg ik ervoor terug?", action: "go_benefits" },
      { text: "Wat betekent premium?", action: "go_premium" },
      { text: "Hoe ziet de tijdlijn eruit?", action: "go_timeline" }
    ]
  },
  benefits: {
    text: "📈 Meer zichtbaarheid zorgt voor meer impact, merkherkenning en hogere ROI. Titanium scoort hier het best — vooral bij bioscoopcampagnes waar iedereen al gefocust is op het scherm.",
    buttons: [
      { text: "Wat is Titanium?", action: "go_titanium" },
      { text: "Wat betekent premium?", action: "go_premium" },
      { text: "Hoe ziet de tijdlijn eruit?", action: "go_timeline" }
    ]
  },
  timeline: {
    text: "🕒 Tijdlijn: [Jingle] > [Standaard ad reel] > [Premium ad reel: Silver & Gold] > [Jingle] > [Premium slot: Titanium] > [Trailers] > [Film]. Elke fase heeft een andere impact op de aandacht van het publiek.",
    buttons: [
      { text: "Wat is Silver?", action: "go_silver" },
      { text: "Wat is Gold?", action: "go_gold" },
      { text: "Wat is Titanium?", action: "go_titanium" },
      { text: "Wat betekent premium?", action: "go_premium" }
    ]
  }
};


function sendQuestionFromBot(topicKey) {
  const topic = topics[topicKey] || topics.fallback;
  const chatbox = document.getElementById('chatbox');

  // ✅ Inject fallback button to all topics except fallback itself
  let buttonList = topic.buttons ? [...topic.buttons] : [];
  if (topicKey !== "fallback") {
    buttonList.push({
      text: "Ik heb een andere vraag",
      action: "go_fallback"
    });
  }

  // Show typing animation
  const typingIndicator1 = document.createElement('div');
  typingIndicator1.className = 'message bot-message typing-indicator';
  typingIndicator1.innerHTML = `
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
  `;
  chatbox.appendChild(typingIndicator1);
  chatbox.scrollTop = chatbox.scrollHeight;

  // Main message after delay
  setTimeout(() => {
    typingIndicator1.remove();

    const botMsg = document.createElement('div');
    botMsg.className = 'message bot-message';
    botMsg.textContent = topic.text;
    chatbox.appendChild(botMsg);
    chatbox.scrollTop = chatbox.scrollHeight;
    // Instantly show buttons for fallback
    if (topicKey === "fallback") {
      createButtons(topic.buttons, chatbox);
      chatbox.scrollTop = chatbox.scrollHeight;
      return; // Exit early so no delay kicks in
    }

    setTimeout(() => {
      // Skip follow-up line for fallback topic
      if (topicKey !== "fallback") {
        const typingIndicator2 = document.createElement('div');
        typingIndicator2.className = 'message bot-message typing-indicator';
        typingIndicator2.innerHTML = `
          <span class="dot"></span>
          <span class="dot"></span>
          <span class="dot"></span>
        `;
        chatbox.appendChild(typingIndicator2);
        chatbox.scrollTop = chatbox.scrollHeight;
        
        setTimeout(() => {
          typingIndicator2.remove();

          const followUp = document.createElement('div');
          followUp.className = 'message bot-message';
          followUp.textContent = "Kan ik je bij nog iets helpen?";
          chatbox.appendChild(followUp);

          createButtons(buttonList, chatbox);
          chatbox.scrollTop = chatbox.scrollHeight;
        }, 2000);
      } else {
        // 🧼 fallback: just show the buttons immediately
        createButtons(buttonList, chatbox);
        chatbox.scrollTop = chatbox.scrollHeight;
      }
    }, 2000);
  }, 1500);
=======
// Brightbuddy Chatbot – Cleaned & Rewritten
let lastTopic = null;

const topics = {
  premium: {
    text: "💎 Premium posities zoals Silver, Gold en Titanium geven je advertentie meer zichtbaarheid. Ze zijn iets duurder, maar strategisch geplaatst.",
    buttons: [
      { text: "Wat is Silver?", action: "go_silver" },
      { text: "Waarom kost het meer?", action: "go_cost" },
      { text: "Wat is de meest premium plek?", action: "go_titanium" }
    ]
  },
  cost: {
    text: "💰 Premium posities zijn duurder omdat ze meer impact hebben. Titanium wordt bijvoorbeeld getoond vlak vóór de trailers, wanneer iedereen al klaarzit.",
    buttons: [
      { text: "Wat krijg ik ervoor terug?", action: "go_benefits" },
      { text: "Toon tijdlijn", action: "go_timeline" }
    ]
  },
  benefits: {
    text: "📈 Meer zichtbaarheid = meer resultaat. Premium posities zorgen voor meer aandacht, betere merkherkenning en dus meer waarde voor je advertentie.",
    buttons: [
      { text: "Wat is Gold?", action: "go_gold" },
      { text: "Waar zit Titanium dan precies?", action: "go_timeline" }
    ]
  },
  silver: {
    text: "🥈 De Silver-positie is de voorlaatste advertentie in de Brightfish ad reel. Een sterke plek net voor het einde van het reclameblok.",
    buttons: [
      { text: "Wat is Gold?", action: "go_gold" },
      { text: "Is dit een premium positie?", action: "go_premium" }
    ]
  },
  gold: {
    text: "🥇 De Gold-positie is de laatste advertentie in de ad reel, vlak vóór de Brightfish jingle. Je ad sluit het reclameblok af.",
    buttons: [
      { text: "Wat is Titanium?", action: "go_titanium" },
      { text: "Waarom zou ik Gold kiezen?", action: "go_benefits" }
    ]
  },
  titanium: {
    text: "🚀 Titanium is de meest premium positie — je advertentie wordt getoond ná de ad reel, vlak vóór de trailers. Iedereen zit dan al klaar: topzichtbaarheid.",
    buttons: [
      { text: "Wat kost dat?", action: "go_cost" },
      { text: "Wat is het verschil met Gold?", action: "go_gold" },
      { text: "Toon de tijdlijn", action: "go_timeline" }
    ]
  },
  reel: {
    text: "📦 De ad reel is een blok van 10–13 minuten waarin alle standaard en premium advertenties zitten. Silver en Gold zitten daar als laatste in.",
    buttons: [
      { text: "Wat zit ervoor?", action: "go_jingle" },
      { text: "Wat komt erna?", action: "go_titanium" }
    ]
  },
  jingle: {
    text: "🔔 De Brightfish jingle speelt twee keer: voor de ad reel en vlak voor Titanium. Het markeert het begin en einde van het reclameblok.",
    buttons: [
      { text: "Wat komt er na de jingle?", action: "go_trailers" },
      { text: "Waar zit mijn advertentie?", action: "go_timeline" }
    ]
  },
  timeline: {
    text: "📊 De tijdlijn start met trailers, gevolgd door de jingle, dan de ad reel (met Silver en Gold), opnieuw een jingle en als laatste: Titanium. Daarna start de film.",
    buttons: [
      { text: "Wat is een ad reel?", action: "go_reel" },
      { text: "Wat is Silver?", action: "go_silver" },
      { text: "Wat is Titanium?", action: "go_titanium" }
    ]
  },
  fallback: {
    text: "Ik begrijp je vraag niet helemaal. Je kan iets vragen over Silver, Gold, Titanium, ad reels, jingles of premium posities.",
    buttons: [
      { text: "Wat is Silver?", action: "go_silver" },
      { text: "Wat is Titanium?", action: "go_titanium" },
      { text: "Wat is een ad reel?", action: "go_reel" },
      { text: "Wat is een jingle?", action: "go_jingle" }
    ]
  }
};

async function getChatbotResponse(userInput) {
  const lower = userInput.toLowerCase();

  if (lower.includes("silver")) return lastTopic = "silver", topics.silver;
  if (lower.includes("gold")) return lastTopic = "gold", topics.gold;
  if (lower.includes("titanium")) return lastTopic = "titanium", topics.titanium;
  if (lower.includes("premium")) return lastTopic = "premium", topics.premium;
  if (lower.includes("reel")) return lastTopic = "reel", topics.reel;
  if (lower.includes("jingle")) return lastTopic = "jingle", topics.jingle;
  if (lower.includes("tijdlijn")) return lastTopic = "timeline", topics.timeline;
  if (lower.includes("waarom") && lower.includes("kost") && lastTopic === "premium") return topics.cost;
  if (lower.includes("wat") && lower.includes("terug") && lastTopic === "premium") return topics.benefits;

  return topics.fallback;
}

async function sendQuestion() {
  const userInputField = document.getElementById("user-input");
  const userInput = userInputField.value.trim();
  if (!userInput) return;

  document.querySelectorAll(".button-container").forEach(c => c.remove());
  const chatbox = document.getElementById("chatbox");

  const userMsg = document.createElement("div");
  userMsg.className = "message user-message";
  userMsg.textContent = userInput;
  chatbox.appendChild(userMsg);

  const response = await getChatbotResponse(userInput);

  const botMsg = document.createElement("div");
  botMsg.className = "message bot-message";
  botMsg.textContent = response.text;
  chatbox.appendChild(botMsg);

  if (response.buttons) {
    createButtons(response.buttons, chatbox);
  }

  chatbox.scrollTop = chatbox.scrollHeight;
  userInputField.value = "";
}

function handleButtonClick(action, label = null) {
  if (label) {
    const msg = document.createElement("div");
    msg.className = "message user-message";
    msg.textContent = label;
    document.getElementById("chatbox").appendChild(msg);
  }
  lastTopic = action.replace("go_", "");
  sendQuestionFromBot(action);
}

function sendQuestionFromBot(text) {
  document.getElementById("user-input").value = text;
  sendQuestion();
>>>>>>> Stashed changes
}

function createButtons(buttons, chatbox) {
  const container = document.createElement("div");
  container.classList.add("button-container");

  buttons.forEach(button => {
<<<<<<< Updated upstream
    const wrapper = document.createElement('div');
    wrapper.classList.add('button-wrapper');

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
=======
    const el = document.createElement("button");
    el.classList.add("button");
    el.textContent = button.text;
    el.onclick = () => {
      container.remove();
      handleButtonClick(button.action, button.text);
>>>>>>> Stashed changes
    };

    wrapper.appendChild(el);
    container.appendChild(wrapper);
  });

  chatbox.appendChild(container);
}

<<<<<<< Updated upstream

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

  createButtons(startOptions, chatbox);

}

});

=======
// Chat toggle logic
document.getElementById("user-input").addEventListener("keydown", e => {
  if (e.key === "Enter") sendQuestion();
});

document.getElementById("chat-toggle").addEventListener("click", () => {
  document.getElementById("chat-wrapper").classList.remove("hidden");
});

document.getElementById("chat-close").addEventListener("click", () => {
  document.getElementById("chat-wrapper").classList.add("hidden");
});

document.addEventListener("click", e => {
  if (!document.getElementById("chat-wrapper").contains(e.target) &&
      !document.getElementById("chat-toggle").contains(e.target)) {
    document.getElementById("chat-wrapper").classList.add("hidden");
  }
});
>>>>>>> Stashed changes
