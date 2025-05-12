async function sendQuestion() {
    const userInput = document.getElementById('user-input').value;
    if (!userInput) return;

    const chatbox = document.getElementById('chatbox');
    chatbox.innerHTML += `<div><strong>You:</strong> ${userInput}</div>`;

    // Call API to get the chatbot's response
    const response = await getChatbotResponse(userInput);

    // Display chatbot's response
    chatbox.innerHTML += `<div><strong>Chatbot:</strong> ${response.text}</div>`;
    
    // Display buttons if response has options
    if (response.buttons) {
      const buttonContainer = document.createElement('div');
      response.buttons.forEach(button => {
        const buttonElement = document.createElement('button');
        buttonElement.classList.add('button');
        buttonElement.textContent = button.text;
        buttonElement.onclick = () => handleButtonClick(button.action);
        buttonContainer.appendChild(buttonElement);
      });
      chatbox.appendChild(buttonContainer);
    }

    // Auto scroll to the bottom of the chatbox
    chatbox.scrollTop = chatbox.scrollHeight;

    // Clear the input field
    document.getElementById('user-input').value = '';
  }

  const getChatbotResponse = async (userInput) => {
    const API_URL = 'http://localhost:8080/api/chat'; // Pointing to your local server
    const data = {
      inputs: userInput,
    };
  
    try {
      const response = await fetch(API_URL, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(data),
      });
  
      if (!response.ok) {
        throw new Error('Failed to fetch');
      }
  
      const json = await response.json();
      console.log('🤖 Response:', json);
      return json; // Process and display the chatbot's response as needed
    } catch (err) {
      console.error('API Error:', err);
    }
  };
  

  function handleButtonClick(action) {
    const chatbox = document.getElementById('chatbox');

    // Handle button actions here
    if (action === 'more_info') {
      chatbox.innerHTML += `<div><strong>Chatbot:</strong> Here is more information...</div>`;
    } else if (action === 'help') {
      chatbox.innerHTML += `<div><strong>Chatbot:</strong> How can I assist you further?</div>`;
    }

    // Auto scroll to the bottom of the chatbox
    chatbox.scrollTop = chatbox.scrollHeight;
  }