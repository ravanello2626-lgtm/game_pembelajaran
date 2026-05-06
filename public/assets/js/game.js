document.addEventListener("DOMContentLoaded", function(){

    let buttons = document.querySelectorAll('.btn, .materi-btn, .pos-btn');

    buttons.forEach(btn=>{

        btn.addEventListener('mouseover', function(){
            if(!this.classList.contains('materi-btn')){
                this.style.transform = "scale(1.08)";
            }
        });

        btn.addEventListener('mouseout', function(){
            if(!this.classList.contains('materi-btn')){
                this.style.transform = "scale(1)";
            }
        });

        btn.addEventListener('click', function(){
            const audio = new Audio('https://www.soundjay.com/buttons/button-16.mp3');
            audio.play();
        });

    });

});