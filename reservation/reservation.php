<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Шах и мат</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../homePage/style.css ">
    <link rel="stylesheet" href="../reservation/reservation.css ">

    <link rel="stylesheet" href="../footer.css">
    <script src="https://kit.fontawesome.com/dbf5309686.js" crossorigin="anonymous"></script>

</head>
<?php
include("../header.php")
?>
<body>
<h1>Visit and reserve your place. You don't have enough time!</h1>
<div class="forReservation">
    <img class="places" src="../img/inside.1.png" alt="">
  <div id="tableMap" class="table-grid"></div>
</div>

<!--  <p>Total Count: <span id="totalCount"></span></p>-->

  <script>
    // Table data (dummy data for demonstration)
    const rows = 3;
    const columns = 8;
    const totalTables = rows * columns;
    const tables = [];
    const reservedPositions = [];
    let index = 0;

    for (let i = 1; i <= totalTables; i++) {
      tables.push({ id: i, label: `T${i}`, status: 'available' });
    }

    // Render table map
    const tableMapContainer = document.getElementById('tableMap');
    // const totalCountElement = document.getElementById('totalCount');

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

    // updateTotalCount();

    // Table reservation function
    function reserveTable(tableId) {
      const tableElement = document.querySelector(`[data-table-id="${tableId}"]`);
      const table = tables.find(t => t.id === tableId);
      let currentSelection = 0;

      if (table.status === 'available') {
        table.status = 'reserved';
        tableElement.classList.remove('available');
        tableElement.classList.add('reserved');
        currentSelection = tableId;
        reservedPositions.push(currentSelection);
        console.log(`Table ${tableId} reserved.`);
      } else if (table.status === 'reserved') {
        table.status = 'available';
        currentSelection = tableId;
        index = reservedPositions.indexOf(currentSelection);
        reservedPositions.splice(index,1)
        tableElement.classList.remove('reserved');
        tableElement.classList.add('available');
        console.log(`Table ${tableId} released.`);
      }
        console.log(reservedPositions);

      // updateTotalCount();
      document.getElementById('place').value = reservedPositions.toString();
    }

    // Update total count
    function updateTotalCount() {
      const reservedTables = tables.filter(table => table.status === 'reserved');
      totalCountElement.textContent = reservedTables.length;

    }
  </script>
<div class="container-image" style="background-image: url('../img/dj.jpg')">
    <div class="mask d-flex align-items-center h-100 ">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Reserve your place!</h2>

              <form action="" method="post">

                <div class="form-outline mb-4">
                  <input type="text" id="form3Example1cg" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example1cg">Your Name</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="time" id="form3Example3cg" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example3cg">Time</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="text" id="place" class="form-control form-control-lg" readonly/>
                  <label class="form-label" for="place">Enter wanted place from the picture</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="number" id="form3Example4cdg" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example4cdg">Enter the number of people</label>
                </div>

                <div class="form-check d-flex justify-content-center mb-5">
                  <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3cg" required/>
                  <label class="form-check-label" for="form2Example3g">
                    I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                  </label>
                </div>

                <div class="d-flex justify-content-center">
                  <button type="button"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
                </div>

                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="#!"
                    class="fw-bold text-body"><u>Login here</u></a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
<?php
include("../footer.php")
?>
</html>