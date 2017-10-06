<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


          <div class="inner cover">
            <h1 class="cover-heading">Encrypt Your Wallet</h1>
            <input type="text" class="form-control" placeholder="Your Encrypted Wallet" required autofocus id="wallet-string"> 
            <input type="password" class="form-control" placeholder="Password" required id="password-string"> <br>
            <input class="btn btn-lg btn-primary btn-block" id="encrypt-btn" type="submit" value="Encrypt" onClick="encryptWallet()">
            <input type="text" class="form-control success" style="display:none;" required id="encrypted-wallet"><br>
            <p class="lead">
              EncryptMyWallet.com does not hold your keys for you. We cannot access accounts, recover keys, reset passwords, nor reverse transactions. Protect your keys & always check that you are on correct URL. <a href="<?=base_url()?>tos">You are responsible for your security.</a>
            </p> 
          </div>
          <script>
            function encryptWallet() {
                  $("#encrypt-btn").hide(); 
                  var wallet = document.getElementById("wallet-string").value;
                  var password = document.getElementById("password-string").value; 
                  var postData = { "private": wallet, "passcode": password };
                  $.ajax({
                      type: 'POST',
                      url: '<?=base_url()?>api/encrypt', 
                      dataType: 'json',
                      data: postData,
                      cache: false,
                      success: function (jsonData) {  
                        document.getElementById("encrypted-wallet").value = jsonData.encrypted;
                        $("#encrypted-wallet").show();
                      }
                  });
              } 
          </script>