<!DOCTYPE html>
<html> 
<head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Formulaire Dodow</title>
    <meta name="description" content="Formulaire en VueJS"> 
    <link rel="stylesheet" href="style2.css">
<!--    <script src="https://cdn.jsdelivr.net/npm/vee-validate@latest/dist/vee-validate.js"></script> 
    <script src="https://unpkg.com/vee-validate@latest"></script> 
    <script>
        Vue.use(VeeValidate); // good to go.
    </script>-->
</head>    

<body> 
    
    <div class="main">
    <h2> Formulaire VueJS</h2>
    <form
      id="app"
      @submit="checkForm"
      action="result.php"
      method="post"
    > 

        <p>
            <label for="ville">Ville</label><br>
            <input
              id="ville"
              v-model="ville"
              type="text" 
              v-validate="'alpha_num'" 
              name="alpha_num_field"

            >
        </p>

        

        <p>
            <label for="code">Code Postal</label><br>
            <input  
              id="code" 
              v-on:click="tiret"
              class="codee"  
              v-model="code"
              type="text"
              name="code"
              min="0"  
              maxlength="8"
            >
        </p> 

          <p>
            <input 
              class="button"
              type="submit"
              value="Submit"
            >
          </p> 
          <p v-if="errors.length">
            <alert-box>Veuillez corriger les erreurs suivantes :</alert-box>
              <li v-for="error in errors">{{ error }}</li>
        </p>
        
         <!--       <p> 
            <input 
                   v-validate="'required|email'" 
                   name="email" 
                   type="text"
                   > 
<!--            <span>{{ errors.first('email') }}</span>-->
 <!--       </p>            
<!--        <span>{{ errors.first('email') }}</span> -->
 <!--                       <span v-show="errors.has('email')">{{ errors.first('email') }}</span> -->
        
          



    </form>
    </div>    
        <canvas class="background"></canvas> 
    
</body>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
<!--    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> --> 
        <script src="js/jquery.js" ></script>
        <script src="js/particles.min.js"></script>
<script>  


// Pour mettre un tiret en jQuery    
//
//$('.codee').keyup(function(code) {
//    this.value = this.value
//        .match(/\d*/g).join('')
//        .match(/(\d{0,3})(\d{0,3})(\d{0,4})/).slice(1).join('-')
//        .replace(/-*$/g, '')
//    ;
//}); 

 
// Fonction pour implémenter les particules JS
window.onload = function() {
  Particles.init({
    selector: '.background',
    color: '#890c1a',
    minDistance: 75,
    connectParticles: false,
    maxParticles: 100,
        responsive: [
    {
      breakpoint: 
        768,
              options: {
                maxParticles: 
        100,
                color: 
        '#890c1a'
        ,
                connectParticles: 
        false
      }
    } 
        ]
  });
}; 
    
    
    
const app = new Vue({
  el: '#app',
  data: {
    errors: [],
    ville: "",
    code: 0,
  }, 
    
  methods:{
    checkForm: function (e) { 

      this.errors = [];   

        
      if (!this.ville && !this.code ) { 
        this.errors.push('Veuillez remplir les champs');  
      }

      else if (!this.ville) {
        this.errors.push('Veuillez écrire une ville.');
      }
        
      else if (!this.validVille(this.ville)) {
        this.errors.push('La ville doit contenir uniquement des termes alphanumérique');
      }
      
      else if (!this.code) {
        this.errors.push('Veuillez écrire un codoe postal.'); 
      } 
      
      else if (!this.validCode(this.code)) {
      this.errors.push('Le code postal doit contenir 7 chiffres de format : 999-9999');
      }

          
        else {
        return true;
      }
        
        

      e.preventDefault();
    }, 
      
      
      // Pour les différentes validation côté client, je vais utiliser les RegEx 
      
      
      validVille: function (ville) {
      var re = /^[a-z0-9]+$/;
      return re.test(ville);
    },
      
    validCode: function (code) {
      var res = /^\d{3}-\d{4}$/g;
      return res.test(code);
    },  
    
    // Fonction permetttant l'affichage du tiret automatique en javascript 
    tiret: function(code) {
    code_val = code.value.replace(/\D[^\.]/g, "");
    code.value = code_val.slice(0,3)+"-"+code_val.slice(3,6)+"-"+code_val.slice(6);
    }
      
    
  }
}) 
</script>

</html>