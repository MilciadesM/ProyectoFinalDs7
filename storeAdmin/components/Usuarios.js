class Usuarios extends HTMLElement{
    constructor(){
        super();
        this.attachShadow({mode:'open'});
    }
    connectedCallback(){
        this.renderHTML();
        this.codeJS();
        this.getClient();
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

            .header-actions {
                display: flex;
                gap: 10px; /* Espacio entre la barra de búsqueda y el botón */
                align-items: center;
            }

            .header .title {
                flex: 0; 
                text-align: center;
                font-size: 24px;
                font-weight: bold;
                margin-left: 10px;
            }

            .header .search-bar {
                padding: 12px;
                border: none;
                border-radius: 5px;
                outline: none;
                width: 300px;
                margin-right: 10px;
            }

            .content {
                padding: 20px;
                display: flex;
                gap: 15px;
            }

            .card-container {
                display: flex;
                justify-content: start;
                align-items: center;
            }

            .card {
                background-color: #fff;
                border: 1px solid #ddd;
                border-radius: 8px;
                width: 300px;
                padding: 16px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                text-align: center;
            }

            .card-header {
                margin-bottom: 16px;
                text-align: start;
            }

            .card-header h3 {
                margin: 0;
                font-size: 1.5em;
                color: #333;
            }

            .card-header p {
                margin: 0;
                color: #777;
                font-size: 0.9em;
                margin-bottom: 30px;
            }

            .card-body p {
                margin: 8px 0;
                font-size: 0.95em;
                color: #555;
            }

            .separator {
                border: none;
                height: 1px;
                background-color: #ddd;
                margin: 12px 0;
            }

        `;
    }
    renderHTML(){
        this.shadowRoot.innerHTML = `
            <style>${Usuarios.styleCss}</style>
            <section class="main-content">
                <header class="header">
                    <h2 class="title">Usuarios</h2>
                    <input type="text" class="search-bar" placeholder="Buscar Usuario...">
                </header>
                <section class="content" id="content"></section>
            </section>
        `;
    }
    codeJS(){

    }

    async getClient() {

        try {

            const result = await fetch(`http://localhost/api/admin/client`,{
                method: "GET",
                headers: {
                    "Authorization": `Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE3MzI2NDU1OTAsImV4cCI6MTczMjY0OTE5MCwiZGF0YSI6eyJpZCI6IjIwMjQxMTI1MDI1MDEyIiwidXNlciI6Ik1JTENJQURFU00iLCJ1c2VydHlwZSI6ImFkbWluIn19.25iDmikjmOMN14a0f9nnWOx9DbEO6xMFJlkKJp-6XrM`
                }
            });

            const resultQuery = await result.json();

            console.log(resultQuery);
            
            if(!resultQuery.success) return alert(resultQuery.message);

            if (resultQuery.data.length <= 0) return alert('No hay datos.');

            this.loadUi(resultQuery.data);

        } catch (error) {
            console.error("Error de petición: ", error);
        }
    }

    loadUi(dataArray) {

        const content = this.shadowRoot.querySelector('#content');

        while (content.firstChild) content.firstChild.remove();

        for (let object of dataArray) {

            content.insertAdjacentHTML('beforeend', `

                <section class="card-container">
                    <section class="card">
                        <header class="card-header">
                            <h3>${object.usuario}</h3>
                            <p>${object.nombre} ${object.apellido}</p>
                        </header>
                        <section class="card-body">
                            <p><strong>Email:</strong> ${object.email}</p>
                            <hr class="separator">
                            <p><strong>Dirección:</strong> David</p>
                            <hr class="separator">
                            <p><strong>Telefono:</strong>  ${object.telefono}</p>
                        </section>
                    </section>
                </section>

            `);
        }
    }
}
customElements.define('comp-usuarios', Usuarios);