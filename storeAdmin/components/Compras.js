class Compras extends HTMLElement{
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
                }

                .card-container {
                    display: flex;
                    justify-content: start;
                }

                .card {
                    width: 600px;
                    border: 1px solid #ddd;
                    border-radius: 8px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                    background-color: #fff;
                }

                .card-header {
                    background-color: #f7f7f7;
                    padding: 10px;
                    text-align: center;
                    border-top-left-radius: 8px;
                    border-top-right-radius: 8px;
                }

                .card-header h3 {
                    margin: 0;
                    font-size: 18px;
                    color: #333;
                }

                .card-body {
                    padding: 20px;
                }

                .row {
                    display: flex;
                    justify-content: space-between;
                    margin-bottom: 10px;
                }

                .col {
                    width: 30%;
                }

                .col p {
                    margin: 5px 0;
                }

                .col strong {
                    font-weight: bold;
                    color: #333;
                }

        `;
    }
    renderHTML(){
        this.shadowRoot.innerHTML = `
            <style>${Compras.styleCss}</style>
            <section class="main-content">
                <header class="header">
                    <h2 class="title">Compras</h2>
                    <input type="text" class="search-bar" placeholder="Buscar Compra...">
                </header>
            <section class="content">
                <section class="card-container">
                    <section class="card">
                        <header class="card-header">
                            <h3>Información de la compra</h3>
                        </header>
                        <section class="card-body">
                            <section class="row">
                                <section class="col">
                                    <p><strong>Nombre:</strong> Juan</p>
                                </section>
                                <section class="col">
                                    <p><strong>Apellido:</strong> Pérez</p>
                                </section>
                                <section class="col">
                                    <p><strong>Usuario:</strong> juanperez</p>
                                </section>
                            </section>
                            <section class="row">
                                <section class="col">
                                    <p><strong>Factura:</strong> ma231</p>
                                </section>
                                <section class="col">
                                    <p><strong>Total:</strong> 79.98</p>
                                </section>
                                <section class="col">
                                    <p><strong>Fecha:</strong> 24/11/2024</p>
                                </section>
                            </section>
                        </section>
                    </section>
                </section>
            </section>
            </section>

        `;
    }
    codeJS(){

    }
}
customElements.define('comp-compras', Compras);