// on cache le zero au clique sur l'input
   document.querySelector('#poidsVise').addEventListener('focus', function(){
       if (this.value == 0) {
           this.value = '';
       }
   });
   document.querySelector('#taille').addEventListener('focus', function(){
       if (this.value == 0) {
           this.value = '';
       }
   });
   document.querySelector('#poidsRef').addEventListener('focus', function(){
    if (this.value == 0) {
    this.value = '';
    }
    });

document.querySelector('#valeur').addEventListener('focus', function(){
    if (this.value == 0) {
        this.value = '';
    }
});