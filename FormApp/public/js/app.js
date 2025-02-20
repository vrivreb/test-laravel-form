document.addEventListener("DOMContentLoaded", function () {
    const name = document.getElementById("name");
    const email = document.getElementById("email");
    const message = document.getElementById("message");
    
    //文字の数の最大値をセットします
    function applyMaxCharactersFilter(element, maxChar) {
        document.querySelectorAll(element).forEach(inputElement => {
            inputElement.addEventListener("invalid", function () {
                if (this.validity.valueMissing) {
                    this.setCustomValidity("このフィールドを入力してください"); 
                } else if (this.validity.typeMismatch) {
                    this.setCustomValidity("入力したメールアドレスに間違えがあります。正しいフォーマットはyamadatarou@mail.jpでございます。");
                } else if (this.validity.tooLong){
                    this.setCustomValidity("このフィールド"+maxChar+"文字以内で入力してください");
                } else{
                    //this.setCustomValidity("");
                    //this.classList.remove("is-invalid");
                }
            });
            inputElement.addEventListener("input", function(){
                if (!this.value.trim()) {
                    this.setCustomValidity("このフィールドを入力してください");
                } else if (this.value.length > maxChar) {
                    this.setCustomValidity("このフィールド"+maxChar+"文字以内で入力してください");
                    this.reportValidity();
                    this.value = this.value.slice(0, maxChar + 1);
                    
                } else if (element === "#email"){
                    const emailExp = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailExp.test(this.value)) {
                        console.log("invalid email!")
                        this.reportValidity();
                    } else {
                        this.setCustomValidity("");
                        this.classList.remove("is-invalid");
                    }  
                } else {
                    this.setCustomValidity("");
                    this.classList.remove("is-invalid");   
                }
            })
            
        })
        
    }

    applyMaxCharactersFilter("#name", 30)
    applyMaxCharactersFilter("#email", 80)
    applyMaxCharactersFilter("#message", 500)

    //メールアドレスのフォーマットを確認します
    /*email.addEventListener("input", function () {
        const emailExp = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailExp.test(this.value)) {
            email.classList.add("is-invalid");
            console.log("invalid email!")
            email.setCustomValidity("入力したメールアドレスに間違えがあります。正しいフォーマットはyamadatarou@mailでございます。");
            email.reportValidity();
        } else {
            email.classList.remove("is-invalid");
            email.setCustomValidity("");
            email.classList.remove("is-invalid");
        }
    });*/

    
});