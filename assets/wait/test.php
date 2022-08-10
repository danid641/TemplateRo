<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Ensures optimal rendering on mobile devices -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" /> <!-- Optimal Internet Explorer compatibility -->
  </head>

  <body>
    <!-- Include the PayPal JavaScript SDK; replace "test" with your own sandbox Business account app client ID -->
    <script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD"></script>

    <!-- Set up a container element for the button -->
    <div id="paypal-button-container"></div>

    <script>
      paypal.Buttons({

        // Sets up the transaction when a payment button is clicked
        createOrder: function(data, actions) {
      return actions.order.create({
         "purchase_units": [{
            "amount": {
              "currency_code": "USD",
              "value": "100",
              "breakdown": {
                "item_total": {  /* Required when including the `items` array */
                  "currency_code": "USD",
                  "value": "100"
                }
              }
            },
            "items": [
              {
                "name": "First Product Name", /* Shows within upper-right dropdown during payment approval */
                "description": "Optional descriptive text..", /* Item details will also be in the completed paypal.com transaction view */
                "unit_amount": {
                  "currency_code": "USD",
                  "value": "50"
                },
                "quantity": "2"
              },
            ]
          }]
      });
    },


        // Finalize the transaction after payer approval
        onApprove: function(data, actions) {
          return actions.order.capture().then(function(orderData) {
            // Successful capture! For dev/demo purposes:
                console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                var transaction = orderData.purchase_units[0].payments.captures[0];
                alert('Transaction '+ transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');

            // When ready to go live, remove the alert and show a success message within this page. For example:
            // var element = document.getElementById('paypal-button-container');
            // element.innerHTML = '';
            // element.innerHTML = '<h3>Thank you for your payment!</h3>';
            // Or go to another URL:  actions.redirect('thank_you.html');
          });
        }
      }).render('#paypal-button-container');

    </script>
  </body>
</html>