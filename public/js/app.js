
class Action {

        constructor() {
            this.boutoncomment = document.querySelector('.btncomment');
            this.formcomment = document.querySelector('#formcomments');
            this.clickBtnReserver()
        }


        clickBtnReserver() {
            this.boutoncomment.addEventListener('click', () => {

                if (this.formcomment.style.display = 'none') {

                    this.formcomment.style.display = 'block'
                }

            })
        }
}   


let app = new Action;