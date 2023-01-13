<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Billing Invoice</title>
  </head>
  <style>
    .billing-container {
      padding: 52px 82px;
      /* background: gray; */
    }
    .billing-title {
      font-family: "NATS";
      font-weight: 400;
      font-size: 48px;
      line-height: 89.84%;
    }
    .latest-bill {
      font-size: 33px;
      line-height: 70px;
      font-weight: 400;
    }
    .billing-info-container {
      padding-left: 32px;
    }
    .bill-text {
      font-family: "Poppins";
      font-weight: 500;
      font-size: 22px;
      line-height: 111.34%;
      padding-left: 43px;
    }
    .previous-bill {
      margin-top: 100px;
    }
    .previous-bill-tab {
      background: #fafafa;
      border: 1px solid #fafafa;
      border-radius: 11.6697px;
    }
    .billing-date-info {
      background: #ffffff;
      box-shadow: 0px 1.45872px 4.37615px rgba(0, 0, 0, 0.25);
      border-radius: 11.6697px;
      padding: 20px 24px;
      /* margin-bottom: 18px; */
    }
    .billing-date-info h4,
    .billing-date-info h6 {
      font-family: "NATS";
      font-weight: bold;
      font-size: 26.2569px;
      /* line-height: 55px; */
    }
    .billing-date-info h6 {
      color: #787878;
      letter-spacing: 1.5px;
    }
    .billing-date-info h5 {
      margin-right: 20px;
      font-family: "NATS";
      /* font-style: normal; */
      font-weight: bold;
      font-size: 21.8807px;
    }
    .view-invoice {
      padding: 18px 24px;
    }
    .view-invoice h6,
    .view-invoice .pending-btn {
      font-weight: 500;
      font-size: 21.8807px;
    }
    .view-invoice .pay-btn,
    .view-invoice .paid-btn {
      background: #9e5ef4;
      border-radius: 7.29358px;
      width: 102.11px;
      height: 33.55px;
      font-size: 20px;
      color: white;
      text-align: center;
      /* margin-left: 39px; */
      margin-left: 0;
      margin-top: 10px;
    }
    .view-invoice .paid-btn {
      background: #98d353;
    }
    @media (min-width: 768px) {
      .view-invoice .pay-btn,
      .view-invoice .paid-btn {
        margin-top: 0;
        margin-left: 39px;
      }
    }
  </style>
  <body>
    <!-- EVENT CALENDER START -->
    <?php
        include("event_calendar.php");
    ?>
    <!-- EVENT CALENDER END -->

    <!-- BILLING CONTAINER START -->
    <div class="container-fluid billing-container">
      <div class="row">
        <div class="col-12">
          <h1 class="billing-title">Billing and Invoices</h1>
          <div class="billing-info-container">
            <div>
              <h3 class="latest-bill">Latest Bills</h3>
              <h6 class="bill-text">No latest bill issued currently!</h6>
            </div>
            <div class="previous-bill">
              <h3 class="latest-bill">Previous Bills</h3>
              <div class="row">
                <div class="col-12 col-lg-6 mb-5">
                  <div class="previous-bill-tab">
                    <div
                      class="billing-date-info d-flex justify-content-between align-items-center"
                    >
                      <div>
                        <h4>October 2022</h4>
                        <h6>16 Clients added</h6>
                      </div>
                      <div
                        class="d-flex justify-content-center align-items-center"
                      >
                        <h5>Download Invoice</h5>
                        <img src="icons/download.png" alt="" />
                      </div>
                    </div>
                    <div
                      class="view-invoice d-flex justify-content-between align-items-center"
                    >
                      <h6>View Invoice</h6>
                      <div class="d-md-flex">
                        <div
                          class="pending-btn d-flex justify-content-center align-items-center text-danger"
                        >
                          <img
                            src="icons/danger.png"
                            alt=""
                            style="margin-right: 7px"
                          />
                          Pending
                        </div>
                        <div class="pay-btn">Pay</div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-lg-6 mb-5">
                  <div class="previous-bill-tab">
                    <div
                      class="billing-date-info d-flex justify-content-between align-items-center"
                    >
                      <div>
                        <h4>September 2022</h4>
                        <h6>16 Clients added</h6>
                      </div>
                      <div
                        class="d-flex justify-content-center align-items-center"
                      >
                        <h5>Download Invoice</h5>
                        <img src="icons/download.png" alt="" />
                      </div>
                    </div>
                    <div
                      class="view-invoice d-flex justify-content-between align-items-center"
                    >
                      <h6>View Invoice</h6>
                      <div class="d-flex">
                        <div class="paid-btn">Paid</div>
                        <!-- <div
                          class="pending-btn d-flex justify-content-center align-items-center text-danger"
                        >
                          <img
                            src="icons/danger.png"
                            alt=""
                            style="margin-right: 7px"
                          />
                          Pending
                        </div> -->
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-lg-6 mb-5">
                  <div class="previous-bill-tab">
                    <div
                      class="billing-date-info d-flex justify-content-between align-items-center"
                    >
                      <div>
                        <h4>August 2022</h4>
                        <h6>16 Clients added</h6>
                      </div>
                      <div
                        class="d-flex justify-content-center align-items-center"
                      >
                        <h5>Download Invoice</h5>
                        <img src="icons/download.png" alt="" />
                      </div>
                    </div>
                    <div
                      class="view-invoice d-flex justify-content-between align-items-center"
                    >
                      <h6>View Invoice</h6>
                      <div class="d-flex">
                        <!-- <div
                          class="pending-btn d-flex justify-content-center align-items-center text-danger"
                        >
                          <img
                            src="icons/danger.png"
                            alt=""
                            style="margin-right: 7px"
                          />
                          Pending
                        </div> -->
                        <div class="paid-btn">Paid</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- BILLING CONTAINER END -->
  </body>
</html>
