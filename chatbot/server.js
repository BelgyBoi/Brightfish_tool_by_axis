// server.js
import express from 'express';
import fetch from 'node-fetch';
import cors from 'cors';

const app = express();
const port = 3000;

app.use(cors()); // Enable CORS for all requests
app.use(express.json()); // Parse JSON bodies

// Endpoint to proxy requests to Hugging Face API
app.post('/api/chat', async (req, res) => {
  const API_URL = 'https://api-inference.huggingface.co/models/gpt2';
  const API_KEY = 'yhf_rWzmJUwgiFVUsRnyGiPvqNfsEUrxEyCvqu'; // Replace with your actual Hugging Face API key

  const headers = {
    'Authorization': `Bearer ${API_KEY}`,
    'Content-Type': 'application/json',
  };

  const data = {
    inputs: req.body.inputs,
  };

  try {
    const response = await fetch(API_URL, {
      method: 'POST',
      headers: headers,
      body: JSON.stringify(data),
    });
    const json = await response.json();
    res.json(json);
  } catch (err) {
    console.error('Error:', err);
    res.status(500).send('Internal Server Error');
  }
});

// Start the server
app.listen(port, () => {
  console.log(`Server is running at http://localhost:${port}`);
});
