<?php
  session_start();
  if (isset($_COOKIE['status'])){
    if ($_COOKIE['status'] === "400"){
      header("location: ./thankyou.php");
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quick Survey</title>
    <link rel="stylesheet" href="./includes/css/index.css">
    <script>
      function addStuff(stuff){
        document.getElementById('question_'+stuff).removeAttribute('hidden');
        document.getElementById('question_'+stuff+'_label').removeAttribute('style');
        document.getElementById('question_'+stuff).setAttribute('required', '');
      }
      function removeStuff(stuff){
        document.getElementById('question_'+stuff).setAttribute('hidden', 'hidden');
        document.getElementById('question_'+stuff+'_label').setAttribute('style', 'display: none;');
        document.getElementById('question_'+stuff).removeAttribute('required');
      }
       function toggle(stuff){
        let why = document.getElementById('question_'+stuff).value;
        let newStuff = stuff + 1;
        switch (why) {
          case 'yes':
            addStuff(newStuff);
            break;
          case 'no':
            removeStuff(newStuff);
            break;        
          default:
            alert("LOL");
            break;
        }
      }
    </script>
  </head>
  <body>
    <div class="bg"></div>
    <div class="container">
      <form action="ndex.php" method="post">
        <h1> Les casa des Naychur </h1>
        
        <fieldset>
          
          <legend>Quick Survey</legend>
        
          <label for="question_1"><span class="number">1</span>What do you think of chatbots?</label>
            <textarea id="bio" name="question_1" required></textarea>

          <label for="question_2"><span class="number">2</span>What is your opinion on using a chatbot on whatsapp?</label>
            <textarea id="question_2" name="question_2" required></textarea>

          <label for="question_3"><span class="number">3</span>As a business owner, do you think its a good idea to integrate a chatbot with whatsapp to automate customer support?</label>
          <select id="question_3" name="question_3" required>
            <option value="no">No</option>
            <option value="yes">Yes</option>
          </select>

          <label for="question_4"><span class="number">4</span>Aside from UBA's Leo, Zenith bank's Ziva and Whatsapp meta. Do you know of any other chatbot inegrated with whatsapp?</label>
          <select id="question_4" name="question_4" onchange="toggle(4)" required>
          <option value="no">No</option>
          <option value="yes">Yes</option>
          </select>
          
          <label for="question_5" id="question_5_label" style="display: none;"><span class="number">4b</span>kindly list them below (seperate by coma if more than one)</label>
          <textarea id="question_5" name="question_5" hidden="hidden"></textarea>
          
          <label for="question_6"><span class="number">5</span>Do you think it is a nice idea to provide 'building and integrating chatbots with whatsapp' as a service?</label>
          <select id="question_6" name="question_6" onchange="toggle(6)" required>
            <option value="no">No</option>
            <option value="yes">Yes</option>
          </select>
          
          <label for="question_7" id="question_7_label" style="display: none;"><span class="number">5b</span>How best can I market this service?</label>
            <textarea id="question_7" name="question_7" hidden="hidden"></textarea>
                  
        </fieldset>
        <button type="submit" name="submit">submit</button>
      </form>
    </div>
    
  </body>
</html>