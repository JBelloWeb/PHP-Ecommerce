<h1 class="page-title">Contacto</h1>

<div class="contact-layout">

    <div class="contact-intro">
        <p class="contact-intro__text">
            ¿Tenés alguna consulta sobre un libro, un pedido o simplemente querés recomendarnos algo? 
            Completá el formulario y te respondemos a la brevedad.
        </p>
    </div>

    <form class="contact-form" action="?sec=enviado" method="GET">

        <div class="form-group">
            <label class="form-label" for="nombre">Nombre</label>
            <input
                class="form-input"
                type="text"
                id="nombre"
                name="nombre"
                placeholder="Tu nombre completo"
                required
            >
        </div>

        <div class="form-group">
            <label class="form-label" for="email">Correo electrónico</label>
            <input
                class="form-input"
                type="email"
                id="email"
                name="email"
                placeholder="tu@email.com"
                required
            >
        </div>

        <div class="form-group">
            <label class="form-label" for="asunto">Asunto</label>
            <select class="form-input form-select" id="asunto" name="asunto" required>
                <option value="" disabled selected>Seleccioná un asunto</option>
                <option value="Consulta sobre un libro">Consulta sobre un libro</option>
                <option value="Estado de un pedido">Estado de un pedido</option>
                <option value="Sugerencia">Sugerencia</option>
                <option value="Otro">Otro</option>
            </select>
        </div>

        <div class="form-group">
            <label class="form-label" for="mensaje">Mensaje</label>
            <textarea
                class="form-input form-textarea"
                id="mensaje"
                name="mensaje"
                placeholder="Escribí tu mensaje aquí..."
                required
            ></textarea>
        </div>

        <input type="hidden" name="sec" value="enviado">

        <div class="form-footer">
            <button class="btn-primary" type="submit">Enviar mensaje</button>
        </div>

    </form>

</div>
