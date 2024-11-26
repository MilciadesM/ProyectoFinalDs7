class Marcas extends HTMLElement{
    constructor(){
        super();
        this.attachShadow({mode:'open'});
    }
    connectedCallback(){
        this.renderHTML();
        this.codeJS();
    }
    static get styleCss(){
        return `
            *{
                padding: 0;
                margin: 0;
                box-sizing: border-box;
            }

            :host{
                width: 100%;
                height: 100%;
                background-color: #387478;
                border-radius: 10px;
                overflow: hidden;
            }

                .main-content {
                flex-grow: 1;
                display: flex;
                flex-direction: column;
                background-color: #e0e0e0;
                }

                /* Header */
                .header {
                display: flex; 
                justify-content: space-between; 
                align-items: center; 
                margin-bottom: 20px; 
                height: 50px;
                background-color: #034780;
                color: white;
                }

                /* Título */
                .header .title {
                flex: 1; 
                text-align: center;
                font-size: 24px;
                font-weight: bold;
                }

                .header .button-agg {
                background-color: #4CAF50; 
                color: white; 
                border: none; 
                padding: 10px 20px; 
                border-radius: 5px; 
                cursor: pointer; 
                font-size: 16px; 
                font-weight: bold; 
                margin-right: 10px;
                }


                .header .button-agg:hover {
                background-color: #45a049;
                }


                .content {
                padding: 20px;
                }

                .cards {
                display: flex;
                flex-wrap: wrap;
                gap: 15px;
                }

     
                .card-style {
                width: 300px; 
                padding: 20px;
                background-color: #f9f9f9;
                border: 1px solid #ddd; 
                border-radius: 10px; 
                box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); 
                text-align: center; 
                display: flex;
                flex-direction: column; 
                justify-content: space-between;
                }
                
                .card-title {
                font-size: 18px;
                font-weight: bold;
                margin-bottom: 10px;
                }

            
                .card-description {
                font-size: 14px;
                color: #555; /* Color de texto más suave */
                margin-bottom: 20px;
                }

               
                .card-buttons {
                display: flex;
                justify-content: space-between;
                gap: 10px; /* Espacio entre botones */
                }

              
                .btn-update,
                .btn-delete {
                flex: 1; 
                padding: 10px 15px;
                font-size: 14px;
                border: 1px solid #ddd; 
                border-radius: 5px;
                cursor: pointer;
                background-color: #fff; 
                transition: background-color 0.3s ease, color 0.3s ease;
                }

                .btn-update {
                color: #2d8f4e;
                border-color: #2d8f4e;
                }

                .btn-delete {
                color: #e74c3c;
                border-color: #e74c3c;
                }

                .btn-update:hover {
                background-color: #2d8f4e;
                color: white;
                }

                .btn-delete:hover {
                background-color: #e74c3c;
                color: white;
                }

                /* Estilo general del modal (oculto por defecto) */
                .modal {
                display: none; /* Ocultarlo por defecto */
                position: fixed;
                z-index: 1; /* Asegurarse de que esté encima de otros elementos */
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5); /* Fondo oscuro translúcido */
                padding-top: 60px;
                }

                /* Estilo del contenido del modal */
                .modal-content {
                background-color: #ffffff;
                margin: auto;
                padding: 20px;
                border: 1px solid #ccc;
                width: 80%;
                max-width: 400px;
                box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
                border-radius: 10px;
                position: relative;
                text-align: left;
                }

                /* Estilo del botón de cerrar */
                .close {
                background: none;
                border: none;
                color: #aaa;
                font-size: 20px;
                font-weight: bold;
                position: absolute;
                top: 10px;
                right: 15px;
                cursor: pointer;
                }

                .close:hover {
                color: black;
                }

                /* Estilo del formulario */
                form {
                display: flex;
                flex-direction: column;
                gap: 15px;
                }

                input[type="text"],
                textarea {
                padding: 10px;
                border-radius: 5px;
                border: 1px solid #ddd;
                font-size: 14px;
                }

                button[type="submit"] {
                padding: 10px;
                background-color: #4CAF50; 
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                }

                button[type="submit"]:hover {
                background-color: #45a049;
                }

                #modalTitle{
                text-align: center;
                padding-bottom: 10px;
                }
        `;
    }
    renderHTML(){
        this.shadowRoot.innerHTML = `
            <style>${Marcas.styleCss}</style>
            <section class="main-content">
                <header class="header">
                    <h2 class="title">Marcas</h2>
                    <button class="button-agg" id="addButton">Agregar Marca</button>
                </header>
            <section class="content">
                <section id="cards-1" class="cards">
                    <article class="card-style">
                        <h1 class="card-title">Título1</h1>
                        <h2 class="card-description">Descripción</h2>
                        <section class="card-buttons">
                            <button class="btn-update" id="editButton">Actualizar</button>
                            <button class="btn-delete">Eliminar</button>
                        </section>
                    </article>
                    <article class="card-style">
                        <h1 class="card-title">Título</h1>
                        <h2 class="card-description">Descripción</h2>
                        <section class="card-buttons">
                            <button class="btn-update">Actualizar</button>
                            <button class="btn-delete">Eliminar</button>
                        </section>
                    </article>
                    <article class="card-style">
                        <h1 class="card-title">Título</h1>
                        <h2 class="card-description">Descripción</h2>
                        <section class="card-buttons">
                            <button class="btn-update">Actualizar</button>
                            <button class="btn-delete">Eliminar</button>
                        </section>
                    </article>
                    <article class="card-style">
                        <h1 class="card-title">Título</h1>
                        <h2 class="card-description">Descripción</h2>
                        <section class="card-buttons">
                            <button class="btn-update">Actualizar</button>
                            <button class="btn-delete">Eliminar</button>
                        </section>
                    </article>
                    <article class="card-style">
                        <h1 class="card-title">Título</h1>
                        <h2 class="card-description">Descripción</h2>
                        <section class="card-buttons">
                            <button class="btn-update">Actualizar</button>
                            <button class="btn-delete">Eliminar</button>
                        </section>
                    </article>
                </section>
            </section>
            </section>

            <section id="myModal" class="modal">
                <section class="modal-content">
                    <button class="close">&times;</button>
                    <h2 id="modalTitle">Formulario</h2>
                    <form id="modalForm">
                    <label for="title">Nombre:</label>
                    <input type="text" id="title" name="title" required><br>
                    <label for="description">Descripción:</label>
                    <textarea id="description" name="description" required></textarea><br>
                    <button type="submit" id="submitButton">Guardar</button>
                    </form>
                </section>
            </section>
        `;
    }
    codeJS(){
        const shadow = this.shadowRoot;

        // Elementos dentro del Shadow DOM
        const modal = shadow.getElementById("myModal");
        const closeBtn = shadow.querySelector(".close");
        const modalTitle = shadow.getElementById("modalTitle");
        const submitButton = shadow.getElementById("submitButton");
        const modalForm = shadow.getElementById("modalForm");
        const addButton = shadow.getElementById("addButton");

        // Abrir el modal para "Agregar"
        addButton.addEventListener("click", () => {
            modalTitle.textContent = "Agregar Marca"; 
            submitButton.textContent = "Agregar"; 
            modalForm.reset(); 
            modal.style.display = "block"; 
        });

        shadow.addEventListener("click", (event) => {
            if (event.target.classList.contains("btn-update")) {
                const card = event.target.closest(".card-style");
                const title = card.querySelector(".card-title").textContent;
                const description = card.querySelector(".card-description").textContent;

                modalTitle.textContent = "Actualizar Marca";
                submitButton.textContent = "Actualizar";

                modalForm.title.value = title;
                modalForm.description.value = description;
                modal.style.display = "block";
            }
        });

        closeBtn.addEventListener("click", () => {
            modal.style.display = "none";
        });

        window.addEventListener("click", (event) => {
            if (event.target === modal) {
                modal.style.display = "none";
            }
        });

        modalForm.addEventListener("submit", (event) => {
            event.preventDefault();
            const action = submitButton.textContent; 
            const data = {
                title: modalForm.title.value,
                description: modalForm.description.value
            };
            console.log(`${action} datos:`, data);
            modal.style.display = "none";
        });
    }

    

}
customElements.define('comp-marcas', Marcas);