class login extends HTMLElement {
    constructor() {
        super();
        this.attachShadow({ mode: 'open' });
    }

    connectedCallback() {
        this.renderHTML();
        this.codeJS();
    }

    static get styleCss() {
        return `
            * {
                padding: 0;
                margin: 0;
                box-sizing: border-box;
            }
            :host {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
                background-image: url("./src/wallpaper.jpg");
                background-repeat: no-repeat;
                background-size: cover;
                z-index: 1000;
            }

            .login-card {
                width: 350px;
                background-color: #fff;
                border-radius: 10px;
                box-shadow: 0 4px 4px 0 rgb(0 0 0 / 0.3);
                overflow: hidden;
            }

            .login-header {
                background-color: #4F7396;
                color: #fff;
                padding: 20px;
                text-align: center;
            }

            .login-header h2 {
                margin: 0;
                font-size: 24px;
            }

            .login-body {
                padding: 20px;
            }

            .login-body label {
                display: block;
                font-weight: bold;
                margin-bottom: 5px;
                color: #333;
            }

            .login-body input {
                width: 100%;
                padding: 10px;
                margin-bottom: 15px;
                border: 1px solid #ddd;
                border-radius: 5px;
                font-size: 14px;
            }

            .login-body input:focus {
                border-color: #4F7396;
                outline: none;
            }

            .login-body button {
                width: 100%;
                padding: 10px;
                background-color: #4F7396;
                color: #fff;
                border: none;
                border-radius: 5px;
                font-size: 16px;
                cursor: pointer;
                font-weight: bold;
                text-transform: uppercase;
            }

            .login-body button:hover {
                background-color: #3d5b78;
            }
        `;
    }

    renderHTML() {
        this.shadowRoot.innerHTML = `
            <style>${login.styleCss}</style>
            <section class="login-card">
                <header class="login-header">
                    <h2>Iniciar Sesión</h2>
                </header>
                <section class="login-body">
                    <form>
                        <label for="username">Usuario</label>
                        <input type="text" id="username" name="username" placeholder="Ingresa tu usuario" required>
                        
                        <label for="password">Contraseña</label>
                        <input type="password" id="password" name="password" placeholder="Ingresa tu contraseña" required>
                        
                        <button type="button" id="loginButton">Ingresar</button>
                    </form>
                </section>
            </section>
        `;
    }

    codeJS() {
    }
}

customElements.define('comp-login', login);
