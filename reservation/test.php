<!DOCTYPE html>
<html>
<head>
  <style>
    .table {
      width: 80px;
      height: 80px;
      background-color: #ccc;
      margin: 10px;
      display: inline-block;
      border-radius: 50%;
      cursor: pointer;
      position: relative;
    }
    .table.available {
      background-color: #a0dca0;
    }
    .table.reserved {
      background-color: #ff7f7f;
      cursor: not-allowed;
    }
    .table .table-label {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      font-weight: bold;
    }
  </style>
</head>
<body>
  <h2>Table Reservation</h2>
  <div id="tableMap"></div>

  <script>
    // Table data (dummy data for demonstration)
    const tables = [
      { id: 1, label: 'T1', status: 'available' },
      { id: 2, label: 'T2', status: 'reserved' },
      { id: 3, label: 'T3', status: 'available' },
      // Add more tables here...
    ];

    // Render table map
    const tableMapContainer = document.getElementById('tableMap');
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

    // Table reservation function
    function reserveTable(tableId) {
      const tableElement = document.querySelector(`[data-table-id="${tableId}"]`);
      const table = tables.find(t => t.id === tableId);

      if (table.status === 'available') {
        table.status = 'reserved';
        tableElement.classList.remove('available');
        tableElement.classList.add('reserved');
        console.log(`Table ${tableId} reserved.`);
      } else if (table.status === 'reserved') {
        console.log(`Table ${tableId} is already reserved.`);
      }
    }
  </script>
</body>
</html>
