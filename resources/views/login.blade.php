<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center vh-100">

  <div class="card shadow p-4" style="width: 100%; max-width: 400px;">
    <h3 class="mb-4 text-center">Admin Login</h3>
    <div class="mb-3">
      <label for="email" class="form-label">Email address</label>
      <input type="email" class="form-control" id="email" placeholder="admin@example.com">
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password">
    </div>
    <div id="message" class="mb-3 text-danger text-center"></div>
    <button onclick="adminLogin()" class="btn btn-primary w-100">Login</button>
  </div>

  <script>
    async function adminLogin() {
      const email = document.getElementById('email').value.trim();
      const password = document.getElementById('password').value.trim();
      const messageEl = document.getElementById('message');
      messageEl.textContent = '';

      const res = await fetch('./api/login', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json'
        },
        body: JSON.stringify({ email, password })
      });

      const data = await res.json();

      if (res.ok) {
        localStorage.setItem('adminToken', data.token);
        messageEl.classList.remove('text-danger');
        messageEl.classList.add('text-success');
        messageEl.textContent = 'Login successful! Redirecting...';
        setTimeout(() => window.location.href = '/welcome', 1000);
      } else {
        messageEl.textContent = data.message || 'Login failed';
        messageEl.classList.remove('text-success');
        messageEl.classList.add('text-danger');
      }
    }
  </script>

</body>
</html>
