<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Clients</title>
  </head>
  <style>
    .client-wrapper {
      padding: 40px 55px;
    }
    .client-title {
      font-family: "NATS";
      font-weight: bold;
      font-size: 48px;
      letter-spacing: 1.8px;
      margin-bottom: 60px;
    }
    .client-search {
      background: #ffffff;
      box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.25);
      border-radius: 10px;
      display: flex;
      align-items: center;
    }
    .client-search input {
      margin: 14px 28px;
      /* margin-left: 28px; */
      border: none;
      width: 100%;
      /* height: inherit; */
    }
    .client-search input::placeholder {
      font-family: "NATS";
      font-style: normal;
      font-weight: 400;
      font-size: 25px;
      color: #acacac;
    }
    .client-search img {
      margin-left: 20px;
    }
    .client-filter-tab {
      background: #ffffff;
      box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.25);
      border-radius: 10px;
    }
    .client-filter-tab p {
      font-family: "NATS";
      font-weight: 400;
      font-size: 25px;
      color: #9c74f5;
      margin-top: 14px;
      margin-left: 14px;
    }
    .delete-box {
      background: #fd2b2b;
      box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.25);
      border-radius: 10px;
      width: 45px;
      height: 45px;
      padding: 30px;
    }
    .active-title,
    .pending-title {
      font-family: "NATS";
      font-weight: bold;
      font-size: 27px;
      position: relative;
    }
    .active-title {
      margin-left: 20px;
    }
    .pending-title {
      margin-left: 60px;
    }
    .active-title::after {
      background: #4b9afb;
      border-radius: 17px;
      content: "";
      position: absolute;
      top: 35px;
      height: 5px;
      width: 92px;
      left: -13px;
    }
    .client-info-tab {
      background: #fafafa;
      border-radius: 15px;
      padding: 48px 34px;
      gap: 60px;
    }

    .client-info h4 {
      font-family: "NATS";
      font-weight: bold;
      font-size: 22px;
      letter-spacing: 1.8px;
    }
    .client-info p {
      font-family: "NATS";
      font-weight: bold;
      font-size: 18px;
      color: #4b9afb;
      letter-spacing: 1.8px;
    }
    .muscle-plan {
      background: #ffffff;
      border: 2px solid #4b9afb;
      border-radius: 6px;
      padding: 7px;
      text-align: center;
      font-family: "NATS";
      font-weight: bold;
      font-size: 12px;
      letter-spacing: 1.7px;
    }
    .months {
      margin-left: 6px;
    }
    @media (min-width: 768px) {
      .client-info-wrapper {
        margin: 50px;
        width: 88%;
      }
    }
  </style>
  <body>
    <!-- EVENT CALENDER START -->
    <?php
        include("event_calendar.php");
    ?>
    <!-- EVENT CALENDER END -->

    <!-- CLIENTS CONTAINER START -->
    <div class="client-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <h1 class="client-title">Clients</h1>
          </div>
          <div class="col-12 col-lg-4 mb-4">
            <div class="client-search">
              <img src="icons/search.png" alt="" />
              <input type="text" placeholder="Search clients" />
            </div>
          </div>
          <div class="col-12 col-lg-7 offset-lg-1">
            <div class="row">
              <div class="col-12 col-lg-3 mb-4">
                <div
                  class="client-filter-tab d-flex align-items-center justify-content-center"
                >
                  <img src="icons/plus.png" alt="" />
                  <p>Add Client</p>
                </div>
              </div>
              <div class="col-12 col-lg-3 mb-4">
                <div
                  class="client-filter-tab d-flex align-items-center justify-content-center"
                >
                  <img src="icons/search (1).png" alt="" />
                  <p>Set Goals</p>
                </div>
              </div>
              <div class="col-12 col-lg-3 mb-4">
                <div
                  class="client-filter-tab d-flex align-items-center justify-content-center"
                >
                  <img src="icons/reminders.png" alt="" />
                  <p>Set Reminders</p>
                </div>
              </div>
              <div class="col">
                <div
                  class="delete-box d-flex justify-content-center align-items-center"
                >
                  <img src="icons/delete.png" alt="" />
                </div>
              </div>
            </div>
          </div>

          <div class="col-3">
            <div class="d-flex">
              <div class="active-title">
                <h4>Active</h4>
              </div>
              <div class="pending-title">
                <h4>Pending</h4>
              </div>
            </div>
          </div>

          <div class="client-info-wrapper mt-5">
            <div class="row">
              <div class="col-12 col-md-6 col-lg-4 mb-4">
                <div class="client-info-tab d-lg-flex">
                  <div>
                    <img src="images/Mask group.png" alt="" />
                  </div>
                  <div class="client-info">
                    <h4>Ronald Richards</h4>
                    <p>Profile</p>
                    <div class="d-flex">
                      <div class="muscle-plan">Muscle Plan</div>
                      <div class="muscle-plan months">2 Months</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-4 mb-4">
                <div class="client-info-tab d-lg-flex">
                  <div>
                    <img src="images/Mask group.png" alt="" />
                  </div>
                  <div class="client-info">
                    <h4>Ronald Richards</h4>
                    <p>Profile</p>
                    <div class="d-flex">
                      <div class="muscle-plan">Muscle Plan</div>
                      <div class="muscle-plan months">2 Months</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-4 mb-4">
                <div class="client-info-tab d-lg-flex">
                  <div>
                    <img src="images/Mask group.png" alt="" />
                  </div>
                  <div class="client-info">
                    <h4>Ronald Richards</h4>
                    <p>Profile</p>
                    <div class="d-flex">
                      <div class="muscle-plan">Muscle Plan</div>
                      <div class="muscle-plan months">2 Months</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-4 mb-4">
                <div class="client-info-tab d-lg-flex">
                  <div>
                    <img src="images/Mask group.png" alt="" />
                  </div>
                  <div class="client-info">
                    <h4>Ronald Richards</h4>
                    <p>Profile</p>
                    <div class="d-flex">
                      <div class="muscle-plan">Muscle Plan</div>
                      <div class="muscle-plan months">2 Months</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-4 mb-4">
                <div class="client-info-tab d-lg-flex">
                  <div>
                    <img src="images/Mask group.png" alt="" />
                  </div>
                  <div class="client-info">
                    <h4>Ronald Richards</h4>
                    <p>Profile</p>
                    <div class="d-flex">
                      <div class="muscle-plan">Muscle Plan</div>
                      <div class="muscle-plan months">2 Months</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-4 mb-4">
                <div class="client-info-tab d-lg-flex">
                  <div>
                    <img src="images/Mask group.png" alt="" />
                  </div>
                  <div class="client-info">
                    <h4>Ronald Richards</h4>
                    <p>Profile</p>
                    <div class="d-flex">
                      <div class="muscle-plan">Muscle Plan</div>
                      <div class="muscle-plan months">2 Months</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- CLIENTS CONTAINER START -->
  </body>
</html>
