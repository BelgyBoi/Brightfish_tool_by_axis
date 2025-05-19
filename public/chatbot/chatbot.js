// CHATBOT SCRIPT - with natural prompt-style buttons
async function sendQuestion() {
  const userInputField = document.getElementById('user-input');
  const userInput = userInputField.value;
  if (!userInput.trim()) return;

  document.querySelectorAll('.button-container').forEach(container => container.remove());
  const chatbox = document.getElementById('chatbox');

  const userMsg = document.createElement('div');
  userMsg.className = 'message user-message';
  userMsg.textContent = userInput;
  chatbox.appendChild(userMsg);

  const response = await getChatbotResponse(userInput);
  if (response.fallbackToAPI) {
    const hfResponse = await fetch("chat.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ inputs: userInput })
    });
    const hfJson = await hfResponse.json();
    response.text = hfJson[0]?.generated_text || "Er ging iets mis met de AI response.";
  }

  const botMsg = document.createElement('div');
  botMsg.className = 'message bot-message';
  botMsg.textContent = response.text;
  chatbox.appendChild(botMsg);

  if (response.buttons) {
    createButtons(response.buttons, chatbox);
  }

  chatbox.scrollTop = chatbox.scrollHeight;
  userInputField.value = '';
}

const getChatbotResponse = async (userInput) => {
  const lowerInput = userInput.toLowerCase();
  if (lowerInput.includes('budget')) {
    return {
      text: "Cinema marketing hoeft geen miljoenen te kosten. Wat is je budget ongeveer?",
      buttons: [
        { text: "Ik heb een klein maar krachtig budget.", action: "budget_low" },
        { text: "Ik wil een gebalanceerd bereik.", action: "budget_mid" },
        { text: "Ik wil maximale impact.", action: "budget_high" }
      ]
    };
  } else if (lowerInput.includes('locatie')) {
    return {
      text: "Wat wil je weten over de locatie?",
      buttons: [
        { text: "Hoeveel cinema’s kan ik kiezen?", action: "location_how_many" },
        { text: "Kan ik meerdere regio’s combineren?", action: "location_combine" },
        { text: "Welke locaties zijn het meest effectief?", action: "location_effective" },
        { text: "Wat als ik nationaal wil adverteren?", action: "location_national" }
      ]
    };
  } else if (lowerInput.includes('duur') || lowerInput.includes('hoe lang')) {
    return {
      text: "Hoe lang wil je dat je campagne loopt?",
      buttons: [
        { text: "Ik wil een campagne van 1 week.", action: "duration_1w" },
        { text: "Ik wil een campagne van 1 maand.", action: "duration_1m" },
        { text: "Ik wil langdurig adverteren.", action: "duration_long" }
      ]
    };
  } else if (lowerInput.includes('doelgroep') || lowerInput.includes('wie wil je bereiken')) {
    return {
      text: "Wie wil je bereiken met je advertentie?",
      buttons: [
        { text: "Ik wil jongeren tussen 16 en 25 bereiken.", action: "audience_youth" },
        { text: "Ik wil gezinnen bereiken.", action: "audience_families" },
        { text: "Ik wil professionals bereiken.", action: "audience_pros" }
      ]
    };
  } else {
    return {
      text: "Ik heb dat niet helemaal begrepen. Probeer iets te vragen over je budget, locatie, duur of doelgroep.",
      buttons: [
        { text: "Wat is het budget?", action: "go_budget" },
        { text: "Wat zijn mijn locatie-opties?", action: "go_location" },
        { text: "Wat is een goede looptijd?", action: "go_duration" },
        { text: "Welke doelgroep kan ik kiezen?", action: "go_audience" }
      ]
    };
  }
};

function handleButtonClick(action, label = null) {
  const chatbox = document.getElementById('chatbox');
  let reply = "";
  let againBtns = [];

  if (label && !action.startsWith('go_')) {
  const msg = document.createElement('div');
  msg.className = 'message user-message';
  msg.textContent = label;
  chatbox.appendChild(msg);
}


  switch (action) {
    case 'budget_low': reply = "Klein maar krachtig is helemaal prima!"; break;
    case 'budget_mid': reply = "Lekker bezig! Dit geeft je wat speelruimte."; break;
    case 'budget_high': reply = "Oeh, maximale impact dus!"; break;
    case 'location_how_many': reply = "Je kiest zelf hoeveel cinema's je gebruikt."; break;
    case 'location_combine': reply = "Je kan regio's combineren."; break;
    case 'location_effective': reply = "Effectieve locaties hangen af van je doelgroep."; break;
    case 'location_national': reply = "Nationaal? Zeker mogelijk."; break;
    case 'duration_1w': reply = "Ideaal voor korte acties."; break;
    case 'duration_1m': reply = "Een maand is perfect voor zichtbaarheid."; break;
    case 'duration_long': reply = "Langlopend werkt goed voor branding."; break;
    case 'audience_youth': reply = "Jongeren houden van cinema en tech."; break;
    case 'audience_families': reply = "Perfect voor merken gericht op ouders."; break;
    case 'audience_pros': reply = "Professionals bezoeken ‘s avonds bioscopen."; break;
    case 'go_budget': return sendQuestionFromBot("Wat is je budget?");
    case 'go_location': return sendQuestionFromBot("In welke locatie wil je adverteren?");
    case 'go_duration': return sendQuestionFromBot("Hoe lang wil je adverteren?");
    case 'go_audience': return sendQuestionFromBot("Welke doelgroep wil je bereiken?");
    case 'go_fallback': return sendQuestionFromBot("Ik heb iets anders nodig.");
    default: reply = "Actie niet herkend.";
  }

  const replyMsg = document.createElement('div');
  replyMsg.classList.add('message', 'bot-message');
  replyMsg.textContent = reply;
  chatbox.appendChild(replyMsg);

  const followUp = document.createElement('div');
  followUp.classList.add('message', 'bot-message');
  followUp.textContent = "Kan ik je bij nog iets anders helpen?";
  chatbox.appendChild(followUp);

  againBtns = createAgainButtons(action);
  againBtns.push({ text: "Andere", action: "go_fallback" });

  createButtons(againBtns, chatbox);
  chatbox.scrollTop = chatbox.scrollHeight;
}

function createAgainButtons(action) {
  switch (action) {
    case 'budget_low':
    case 'budget_mid':
    case 'budget_high':
      return [
        { text: "Ik heb een klein maar krachtig budget.", action: "budget_low" },
        { text: "Ik wil een gebalanceerd bereik.", action: "budget_mid" },
        { text: "Ik wil maximale impact.", action: "budget_high" }
      ];
    case 'location_how_many':
    case 'location_combine':
    case 'location_effective':
    case 'location_national':
      return [
        { text: "Hoeveel cinema’s kan ik kiezen?", action: "location_how_many" },
        { text: "Kan ik meerdere regio’s combineren?", action: "location_combine" },
        { text: "Welke locaties zijn het meest effectief?", action: "location_effective" },
        { text: "Wat als ik nationaal wil adverteren?", action: "location_national" }
      ];
    case 'duration_1w':
    case 'duration_1m':
    case 'duration_long':
      return [
        { text: "Ik wil een campagne van 1 week.", action: "duration_1w" },
        { text: "Ik wil een campagne van 1 maand.", action: "duration_1m" },
        { text: "Ik wil langdurig adverteren.", action: "duration_long" }
      ];
    case 'audience_youth':
    case 'audience_families':
    case 'audience_pros':
      return [
        { text: "Ik wil jongeren tussen 16 en 25 bereiken.", action: "audience_youth" },
        { text: "Ik wil gezinnen bereiken.", action: "audience_families" },
        { text: "Ik wil professionals bereiken.", action: "audience_pros" }
      ];
    default:
      return [];
  }
}

function createButtons(buttons, chatbox) {
  const container = document.createElement('div');
  container.classList.add('button-container');

  buttons.forEach(button => {
    const el = document.createElement('button');
    el.classList.add('button');
    el.textContent = button.text;
    el.onclick = (e) => {
      e.stopPropagation();
      const toRemove = e.target.closest('.button-container');
      if (toRemove) toRemove.remove();
      handleButtonClick(button.action, button.text);
    };
    container.appendChild(el);
  });

  chatbox.appendChild(container);
}

function sendQuestionFromBot(message) {
  document.getElementById('user-input').value = message;
  sendQuestion();
}

document.getElementById('user-input').addEventListener('keydown', function (e) {
  if (e.key === 'Enter') sendQuestion();
});

const chatWrapper = document.getElementById('chat-wrapper');
const chatToggle = document.getElementById('chat-toggle');
const chatClose = document.getElementById('chat-close');

chatToggle.addEventListener('click', () => chatWrapper.classList.remove('hidden'));
chatClose.addEventListener('click', () => chatWrapper.classList.add('hidden'));

document.addEventListener('click', (e) => {
  if (!chatWrapper.contains(e.target) && !chatToggle.contains(e.target)) {
    chatWrapper.classList.add('hidden');
  }
});