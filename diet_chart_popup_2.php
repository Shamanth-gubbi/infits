<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--=============== BOXICONS ===============-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

        <!--=============== CSS ===============-->
        <style>
            /*=============== GOOGLE FONTS ===============*/
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap');

            /*=============== VARIABLES CSS ===============*/
            :root {
            /*========== Colors ==========*/
            --hue: 240;
            --first-color: hsl(var(--hue), 16%, 18%);
            --first-color-alt: hsl(var(--hue), 16%, 12%);
            --title-color: hsl(var(--hue), 8%, 15%);
            --text-color: hsl(var(--hue), 8%, 35%);
            --body-color: hsl(var(--hue), 100%, 99%);
            --container-color: #FFF;

            /*========== Font and typography ==========*/
            --body-font: 'Poppins', sans-serif;
            --big-font-size: 1.5rem;
            --normal-font-size: .938rem;

            /*========== z index ==========*/
            --z-modal: 1000;
            }

            @media screen and (min-width: 968px) {
            :root {
                --big-font-size: 1.75rem;
                --normal-font-size: 1rem;
            }
            }

            /*=============== BASE ===============*/
            *{
            box-sizing: border-box;
            padding: 0;
            margin: 0;
            }

            body,
            button{
            font-family: var(--body-font);
            font-size: var(--normal-font-size);
            }

            body{
            background-color: var(--body-color);
            color: var(--text-color);
            position: relative;
            }

            button{
            cursor: pointer;
            border: none;
            outline: none;
            }

            img{
            max-width: 100%;
            height: auto;
            }

            /*=============== MODAL ===============*/
            .container{
            margin-left: 1rem;
            margin-right: 1rem;
            }

            .modal{
            height: 100vh;
            display: grid;
            place-items: center;
            }

            .modal__button{
            display: inline-block;
            padding: 1rem 1.25rem;
            border-radius: .5rem;
            transition: .3s;
            background-color: white;
            border: none;
            box-shadow: 0px 8px 24px rgba(176, 190, 197, 0.32), 0px 3px 5px rgba(176, 190, 197, 0.32);
            color: #DF6293;
            font-size: 16px;
            cursor: pointer;
            width: 140px;
            }

            .modal__button:hover{
            background-color: var(--first-color-alt);
            }

            .modal__container{
            position: absolute;
            top: 0;
            left: 0;
            background-color: hsla(var(--hue), 18%, 75%, .8);
            width: 100%;
            height: 100%;
            display: grid;
            align-items: flex-end;
            overflow: hidden;
            transition: all .3s;
            z-index: var(--z-modal);
            visibility: hidden;
            opacity: 0;

            /*=== Effect 3 ===*/
            /* perspective: 1000px; */
            }

            .modal__content{
            position: relative;
            background-color: var(--container-color);
            text-align: center;
            padding: 3rem 2rem 2rem;
            border-radius: 1rem 1rem 0 0;
            transition: all .3s;

            /*=== Effect 1 ===*/
            transform: translateY(10%);

            /*=== Effect 2 ===*/
            /* transform: scale(.5) translateY(10%); */

            /*=== Effect 3 ===*/
            /* transform: rotateX(65deg) scale(.75) translateY(10%);
            transform-origin: 50% 100%; */
            }

            .modal__img{
            width: 150px;
            margin-bottom: .75rem;
            }

            .modal__close{
            display: inline-flex;
            background-color: var(--first-color);
            border-radius: .25rem;
            color: #FFF;
            font-size: 1.5rem;
            position: absolute;
            top: 2rem;
            right: 2rem;
            cursor: pointer;
            }

            .modal__title{
            font-size: var(--big-font-size);
            color: var(--title-color);
            font-weight: 500;
            }

            .modal__description{
            margin-bottom: 1.5rem;
            }

            .modal__button-width{
            width: 90%;
            }

            .modal__button-link{
            display: block;
            margin: 1rem auto 0;
            background-color: transparent;
            color: var(--first-color);
            font-weight: 500;
            }

            /* Show modal */
            .show-modal{
            visibility: visible;
            opacity: 1;
            }

            .show-modal .modal__content{
            /*=== Effect 1 ===*/
            transform: translateY(0);

            /*=== Effect 2 ===*/
            /* transform: scale(1) translateY(0); */

            /*=== Effect 3 ===*/
            /* transform: rotateX(0) scale(1) translateY(0); */
            }

            /*=============== BREAKPOINTS ===============*/
            /* For small devices */
            @media screen and (min-width: 576px){
            .modal__content{
                margin: auto;
                width: 380px;
                border-radius: 1.25rem;
            }

            .modal__img{
                width: 170px;
            }
            }
        </style>
    </head>
    <body>
            <button class="modal__button" id="open-modal"  onclick="m_display();">
            <i class="fa fa-plus"></i>
            </button>

            <div class="modal__container" id="modal-container">
                <div class="modal__content">
                    <div class="modal__close close-modal" title="Close">
                        <i class='bx bx-x'></i>
                    </div>

                    <h1 class="modal__title">Good Job!</h1>
                    <p class="modal__description">Click the button to close</p>

                    <button class="modal__button modal__button-width">
                        View status
                    </button>

                    <button class="modal__button-link close-modal">
                        Close
                    </button>
                </div>
            </div>
       

        <!--=============== MAIN JS ===============-->
        <script>
            /*=============== SHOW MODAL ===============*/
            const showModal = (openButton, modalContent) =>{
                const openBtn = document.getElementById(openButton),
                modalContainer = document.getElementById(modalContent)
                
                if(openBtn && modalContainer){
                    openBtn.addEventListener('click', ()=>{
                        modalContainer.classList.add('show-modal')
                    })
                }
            }
            showModal('open-modal','modal-container')

            /*=============== CLOSE MODAL ===============*/
            const closeBtn = document.querySelectorAll('.close-modal')

            function closeModal(){
                const modalContainer = document.getElementById('modal-container')
                modalContainer.classList.remove('show-modal')
            }
            closeBtn.forEach(c => c.addEventListener('click', closeModal))

            function m_display(){
                event.preventDefault();
                modal.style.display ="block";
            }

        </script>
    </body>
</html>