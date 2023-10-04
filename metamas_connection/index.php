<html>
  <head>
    <title>Connect to crypto wallet</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/web3/1.7.4-rc.1/web3.min.js"></script>
    <style>
      /* CSS Styles */
      body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        text-align: center;
      }

      .container {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      }

      input[type="button"] {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
      }

      input[type="button"]:hover {
        background-color: #0056b3;
      }

      #wallet-info {
        margin-top: 20px;
        font-weight: bold;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <h1>Connect to Wallet</h1>
      <script>
        /* To connect using MetaMask */
        async function connect() {
          if (window.ethereum) {
            await window.ethereum.request({
              method: "eth_requestAccounts",
            });
            window.web3 = new Web3(window.ethereum);
            const account = web3.eth.accounts;
            // Get the current MetaMask selected/active wallet
            const walletAddress = account.givenProvider.selectedAddress;
            console.log(`Wallet: ${walletAddress}`);
            document.getElementById(
              "wallet-info"
            ).innerText = `Wallet: ${walletAddress}`;
          } else {
            console.log("No wallet");
          }
        }
      </script>
      <input type="button" value="Connect Wallet" onclick="connect();" />
      <div id="wallet-info"></div>
    </div>
  </body>
</html>
