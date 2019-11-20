// Pour mettre un tiret en jQuery    
//
//$('.codee').keyup(function(code) {
//    this.value = this.value
//        .match(/\d*/g).join('')
//        .match(/(\d{0,3})(\d{0,3})(\d{0,4})/).slice(1).join('-')
//        .replace(/-*$/g, '')
//    ;
//}); 
    

    
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
