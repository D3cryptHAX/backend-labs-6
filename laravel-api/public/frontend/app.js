const apiUrl = 'http://localhost:8000/api';

// Fetch subscribers and display them
document.getElementById('getSubscribersBtn').addEventListener('click', async () => {
  const response = await fetch(`${apiUrl}/subscribers`);
  const data = await response.json();
  const list = document.getElementById('subscribersList');
  list.innerHTML = '';

  data.data.forEach(subscriber => {
    const div = document.createElement('div');
    div.innerHTML = `
      <strong>Name:</strong> ${subscriber.name}<br>
      <strong>Email:</strong> ${subscriber.email}<br>
    `;
    list.appendChild(div);
  });
});

document.getElementById('getSubscriptionsBtn').addEventListener('click', async () => {
  const response = await fetch(`${apiUrl}/subscriptions`);
  const data = await response.json();
  const list = document.getElementById('subscriptionsList');
  list.innerHTML = '';

  data.data.forEach(subscription => {
    const div = document.createElement('div');
    div.innerHTML = `
      <strong>Service:</strong> ${subscription.service}<br>
      <strong>Topic:</strong> ${subscription.topic}<br>
    `;
    list.appendChild(div);
  });
});

// Add Subscriber
document.getElementById('subscriberForm').addEventListener('submit', async (e) => {
  e.preventDefault();
  const name = document.getElementById('subscriberName').value;
  const email = document.getElementById('subscriberEmail').value;

  const response = await fetch(`${apiUrl}/subscribers`, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({ name, email })
  });
});

// Add Subscription
document.getElementById('subscriptionForm').addEventListener('submit', async (e) => {
  e.preventDefault();
  const service = document.getElementById('subscriptionService').value;
  const topic = document.getElementById('subscriptionTopic').value;
  const subscriber_id = parseInt(document.getElementById('subscriptionSubscriberId').value);

  const response = await fetch(`${apiUrl}/subscriptions`, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({ service, topic, subscriber_id })
  });
});

