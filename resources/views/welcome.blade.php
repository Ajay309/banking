<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Bank PDF Upload Admin Panel</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <script src="https://unpkg.com/feather-icons"></script>
</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-50 min-h-screen">
  <div class="flex h-screen overflow-hidden">
    <!-- Sidebar -->
    <div id="sidebar" class="bg-white shadow-lg w-64 flex-shrink-0 transition-all duration-300 ease-in-out z-20">
      <div class="h-full flex flex-col">
        <!-- Logo -->
        <div class="flex items-center justify-between px-6 py-5 border-b">
          <div class="flex items-center">
            <div class="bg-blue-600 text-white p-2 rounded-lg">
              <i data-feather="briefcase" class="h-5 w-5"></i>
            </div>
            <span class="ml-3 text-xl font-semibold text-gray-800">BankAdmin</span>
          </div>
          <button id="closeSidebar" class="md:hidden text-gray-500 hover:text-gray-700">
            <i data-feather="x" class="h-5 w-5"></i>
          </button>
        </div>
        
        <!-- Navigation -->
        <nav class="flex-1 overflow-y-auto py-4">
          <div class="px-4 mb-2">
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Main</p>
          </div>
          <ul>
            <li>
              <a href="#" class="flex items-center px-6 py-3 text-gray-500 hover:bg-blue-50 hover:text-blue-600 group">
                <i data-feather="home" class="h-5 w-5 mr-3 text-gray-400 group-hover:text-blue-600"></i>
                Dashboard
              </a>
            </li>
            <li>
              <a href="#" class="flex items-center px-6 py-3 bg-blue-50 text-blue-600">
                <i data-feather="file-text" class="h-5 w-5 mr-3 text-blue-600"></i>
                Bank Documents
              </a>
            </li>
            <li>
              <a href="#" class="flex items-center px-6 py-3 text-gray-500 hover:bg-blue-50 hover:text-blue-600 group">
                <i data-feather="users" class="h-5 w-5 mr-3 text-gray-400 group-hover:text-blue-600"></i>
                Customers
              </a>
            </li>
            <li>
              <a href="#" class="flex items-center px-6 py-3 text-gray-500 hover:bg-blue-50 hover:text-blue-600 group">
                <i data-feather="credit-card" class="h-5 w-5 mr-3 text-gray-400 group-hover:text-blue-600"></i>
                Transactions
              </a>
            </li>
          </ul>
          
          <div class="px-4 mt-6 mb-2">
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Settings</p>
          </div>
          <ul>
            <li>
              <a href="#" class="flex items-center px-6 py-3 text-gray-500 hover:bg-blue-50 hover:text-blue-600 group">
                <i data-feather="settings" class="h-5 w-5 mr-3 text-gray-400 group-hover:text-blue-600"></i>
                General Settings
              </a>
            </li>
            <li>
              <a href="#" class="flex items-center px-6 py-3 text-gray-500 hover:bg-blue-50 hover:text-blue-600 group">
                <i data-feather="shield" class="h-5 w-5 mr-3 text-gray-400 group-hover:text-blue-600"></i>
                Security
              </a>
            </li>
          </ul>
        </nav>
        
        <!-- User Profile -->
        <div class="border-t p-4">
          <div class="flex items-center">
            <div class="bg-blue-100 rounded-full p-2">
              <i data-feather="user" class="h-5 w-5 text-blue-600"></i>
            </div>
            <div class="ml-3">
              <p class="text-sm font-medium text-gray-700">Admin User</p>
              <p class="text-xs text-gray-500">admin@example.com</p>
            </div>
            <div class="ml-auto">
              <button class="text-gray-400 hover:text-gray-600">
                <i data-feather="log-out" class="h-4 w-4"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-hidden">
      <!-- Top Header -->
      <header class="bg-white shadow-sm z-10">
        <div class="flex items-center justify-between px-6 py-4">
          <button id="openSidebar" class="md:hidden text-gray-500 hover:text-gray-700">
            <i data-feather="menu" class="h-6 w-6"></i>
          </button>
          <div class="flex items-center md:ml-0 ml-4">
            <h1 class="text-lg font-semibold text-gray-800">Bank Documents</h1>
          </div>
          <div class="flex items-center space-x-3">
            <button class="text-gray-500 hover:text-gray-700 relative">
              <i data-feather="bell" class="h-5 w-5"></i>
              <span class="absolute top-0 right-0 h-2 w-2 bg-red-500 rounded-full"></span>
            </button>
            <div class="bg-blue-100 p-2 rounded-full">
              <i data-feather="user" class="text-blue-600 h-5 w-5"></i>
            </div>
          </div>
        </div>
      </header>

      <!-- Main Content Area -->
      <main class="flex-1 overflow-y-auto p-6">
        <div class="container mx-auto max-w-6xl">
          <!-- Breadcrumbs -->
          <div class="flex items-center text-sm text-gray-500 mb-6">
            <a href="#" class="hover:text-blue-600">Dashboard</a>
            <i data-feather="chevron-right" class="h-4 w-4 mx-2"></i>
            <span class="text-gray-700">Bank Documents</span>
          </div>

          <!-- Upload Form -->
          <div class="bg-white rounded-xl shadow-md p-6 mb-8">
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Upload New Bank Document</h2>
            <form action="{{ route('bank-details.store') }}" method="POST" class="space-y-4" enctype="multipart/form-data">
              @csrf
              <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                  <label for="user_name" class="block text-sm font-medium text-gray-700 mb-1"> User Name</label>
                  <input type="text" name="user_name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition" id="user_name" placeholder="Enter User number" required>
                </div>
                <div>
                  <label for="account_number" class="block text-sm font-medium text-gray-700 mb-1">Account Number</label>
                  <input type="text" name="account_number" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition" id="account_number" placeholder="Enter account number" required>
                </div>
                <div>
                  <label for="ifsc_code" class="block text-sm font-medium text-gray-700 mb-1">IFSC Code</label>
                  <input type="text" name="ifsc_code" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition" id="ifsc_code" placeholder="Enter IFSC code" required>
                </div>
              </div>
              
              <div class="mt-4">
                <label for="pdf_file" class="block text-sm font-medium text-gray-700 mb-1">PDF Document</label>
                <div class="flex items-center justify-center w-full">
                  <label for="pdf_file" class="flex flex-col items-center justify-center w-full h-32 border-2 border-blue-300 border-dashed rounded-lg cursor-pointer bg-blue-50 hover:bg-blue-100 transition">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                      <i data-feather="file" class="text-blue-500 mb-2"></i>
                      <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                      <p class="text-xs text-gray-500">PDF files only</p>
                    </div>
                    <input id="pdf_file" name="pdf_file" type="file" class="hidden" accept="application/pdf" required />
                  </label>
                </div>
                <div id="file-name" class="mt-2 text-sm text-gray-500"></div>
              </div>
              
              <div class="flex justify-end mt-4">
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition">
                  <span class="flex items-center">
                    <i data-feather="upload-cloud" class="h-4 w-4 mr-2"></i>
                    Upload Document
                  </span>
                </button>
              </div>
            </form>
          </div>

          <!-- Search and Table -->
          <div class="bg-white rounded-xl shadow-md p-6">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
              <h2 class="text-lg font-semibold text-gray-700 mb-4 md:mb-0">Bank Documents</h2>
              <form method="GET" action="{{ url()->current() }}" class="relative">
                <input type="text" name="search" placeholder="Search by account or IFSC..." 
                      value="{{ request('search') }}"
                      class="w-full md:w-64 pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                  <i data-feather="search" class="h-4 w-4 text-gray-400"></i>
                </div>
              </form>
            </div>

            <div class="overflow-x-auto">
              <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                  <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Account Number</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">IFSC Code</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Document</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                  @forelse($bankDetails as $bank)
                    <tr class="hover:bg-gray-50">
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $bank->id }}</td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user_name->id }}</td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $bank->account_number }}</td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $bank->ifsc_code }}</td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <a href="{{ $bank->pdf_url }}" target="_blank" class="text-blue-600 hover:text-blue-800 flex items-center">
                          <i data-feather="file-text" class="h-4 w-4 mr-1"></i> View PDF
                        </a>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <form action="{{ route('bank-details.destroy', $bank->id) }}" method="POST" class="inline">
                          @csrf
                          @method('DELETE')
                          <button type="button" onclick="confirmDelete(this)" class="text-red-600 hover:text-red-800 focus:outline-none">
                            <i data-feather="trash-2" class="h-4 w-4"></i>
                          </button>
                        </form>
                      </td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="5" class="px-6 py-10 text-center text-gray-500">
                        <div class="flex flex-col items-center">
                          <i data-feather="file-text" class="h-10 w-10 text-gray-300 mb-2"></i>
                          <p>No documents found</p>
                        </div>
                      </td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
            </div>

            <div class="mt-6 flex justify-center">
              {{ $bankDetails->links() }}
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>

  <!-- Loading Overlay -->
  <div id="loadingOverlay" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white p-5 rounded-lg shadow-lg flex items-center">
      <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
      </svg>
      <span>Processing...</span>
    </div>
  </div>

  <script>
    // Initialize Feather icons
    document.addEventListener('DOMContentLoaded', () => {
      feather.replace();
      
      // Mobile sidebar toggle
      const sidebar = document.getElementById('sidebar');
      const openSidebarBtn = document.getElementById('openSidebar');
      const closeSidebarBtn = document.getElementById('closeSidebar');
      
      openSidebarBtn.addEventListener('click', () => {
        sidebar.classList.remove('-translate-x-full');
        sidebar.classList.add('translate-x-0');
      });
      
      closeSidebarBtn.addEventListener('click', () => {
        sidebar.classList.remove('translate-x-0');
        sidebar.classList.add('-translate-x-full');
      });
      
      // Handle responsive sidebar
      function handleResize() {
        if (window.innerWidth < 768) {
          sidebar.classList.add('-translate-x-full');
          sidebar.classList.remove('translate-x-0');
        } else {
          sidebar.classList.remove('-translate-x-full');
          sidebar.classList.add('translate-x-0');
        }
      }
      
      // Initial check and event listener for resize
      handleResize();
      window.addEventListener('resize', handleResize);

      // Show file name when selected
      document.getElementById('pdf_file').addEventListener('change', function() {
        const fileName = this.files[0]?.name;
        document.getElementById('file-name').textContent = fileName ? `Selected: ${fileName}` : '';
      });

      // Form submission loading indicator
      const forms = document.querySelectorAll('form');
      forms.forEach(form => {
        form.addEventListener('submit', function() {
          document.getElementById('loadingOverlay').classList.remove('hidden');
        });
      });
    });

    function confirmDelete(button) {
      if (confirm('Are you sure you want to delete this document?')) {
        button.closest('form').submit();
      }
    }

    // Notification system for displaying flash messages
    @if(session('success'))
      showNotification("{{ session('success') }}", 'success');
    @endif

    @if(session('error'))
      showNotification("{{ session('error') }}", 'error');
    @endif

    function showNotification(message, type) {
      // Remove existing notifications
      const existingNotifications = document.querySelectorAll('.notification');
      existingNotifications.forEach(notification => notification.remove());
      
      // Create new notification
      const notification = document.createElement('div');
      notification.className = `notification fixed top-4 right-4 px-6 py-3 rounded-lg shadow-lg z-50 transform transition-all duration-500 translate-x-full`;
      
      if (type === 'success') {
        notification.classList.add('bg-green-50', 'border-l-4', 'border-green-500', 'text-green-700');
      } else {
        notification.classList.add('bg-red-50', 'border-l-4', 'border-red-500', 'text-red-700');
      }
      
      notification.innerHTML = `
        <div class="flex items-center">
          <div class="flex-shrink-0">
            <i data-feather="${type === 'success' ? 'check-circle' : 'alert-circle'}" class="h-5 w-5"></i>
          </div>
          <div class="ml-3">
            <p class="text-sm font-medium">${message}</p>
          </div>
          <div class="ml-auto pl-3">
            <button class="inline-flex text-gray-400 focus:outline-none focus:text-gray-500 transition ease-in-out duration-150">
              <i data-feather="x" class="h-4 w-4"></i>
            </button>
          </div>
        </div>
      `;
      
      document.body.appendChild(notification);
      feather.replace();
      
      // Show notification
      setTimeout(() => {
        notification.classList.remove('translate-x-full');
      }, 10);
      
      // Add click event to close button
      notification.querySelector('button').addEventListener('click', () => {
        notification.classList.add('translate-x-full');
        setTimeout(() => {
          notification.remove();
        }, 500);
      });
      
      // Auto hide after 5 seconds
      setTimeout(() => {
        notification.classList.add('translate-x-full');
        setTimeout(() => {
          notification.remove();
        }, 500);
      }, 5000);
    }
  </script>
</body>
</html>