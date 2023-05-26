<!DOCTYPE html>
<html>
<head>
  <style>
    .table-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 10px;
      justify-items: center;
    }
    .table {
      width: 60px;
      height: 60px;
      background-color: #ccc;
      border-radius: 50%;
    }
    .table.available {
      background-color: #a0dca0;
    }
    .table.reserved {
      background-color: #ff7f7f;
    }
    .table-label {
      text-align: center;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <h2>Table Reservation</h2>
  <div id="tableMap" class="table-grid"></div>
  <p>Total Count: <span id="totalCount"></span></p>

  <script>
    // Table data (dummy data for demonstration)
    const rows = 3;
    const columns = 8;
    const totalTables = rows * columns;
    const tables = [];

    for (let i = 1; i <= totalTables; i++) {
      tables.push({ id: i, label: `T${i}`, status: 'available' });
    }

    // Render table map
    const tableMapContainer = document.getElementById('tableMap');
    const totalCountElement = document.getElementById('totalCount');

    tables.forEach(table => {
      const tableElement = document.createElement('div');
      tableElement.className = `table ${table.status}`;
      tableElement.setAttribute('data-table-id', table.id);
      tableElement.addEventListener('click', () => reserveTable(table.id));
      const tableLabel = document.createElement('div');
      tableLabel.className = 'table-label';
      tableLabel.textContent = table.label;
      tableElement.appendChild(tableLabel);
      tableMapContainer.appendChild(tableElement);
    });

    updateTotalCount();

    // Table reservation function
    function reserveTable(tableId) {
      const table = tables.find(t => t.id === tableId);

      if (table.status === 'available') {
        const registrationForm = document.createElement('form');
        registrationForm.addEventListener('submit', event => {
          event.preventDefault();
          // Process the registration form here

          // Update the table status after successful registration
          table.status = 'reserved';
          tableElement.classList.remove('available');
          tableElement.classList.add('reserved');
          console.log(`Table ${tableId} reserved.`);

          updateTotalCount();

          // Close the popup window
          popupWindow.close();
        });

        const nameLabel = document.createElement('label');
        nameLabel.textContent = 'Name:';
        const nameInput = document.createElement('input');
        nameInput.type = 'text';
        nameInput.required = true;

        const emailLabel = document.createElement('label');
        emailLabel.textContent = 'Email:';
        const emailInput = document.createElement('input');
        emailInput.type = 'email';
        emailInput.required = true;

        const submitButton = document.createElement('button');
        submitButton.type = 'submit';
        submitButton.textContent = 'Reserve';

        registrationForm.appendChild(nameLabel);
        registrationForm.appendChild(nameInput);
        registrationForm.appendChild(emailLabel);
        registrationForm.appendChild(emailInput);
        registrationForm.appendChild(submitButton);

        // Open a new popup window with the registration form
        const popupWindow = window.open('', 'Registration', 'width=400,height=300');
        popupWindow.document.body.appendChild(registrationForm);
      } else if (table.status === 'reserved') {
        console.log(`Table ${tableId} is already reserved.`);
      }
    }

    // Update total count
    function updateTotalCount() {
      const reservedTables = tables.filter(table => table.status === 'reserved');
      totalCountElement.textContent = reservedTables.length;
    }
  </script>
</body>
</html>
