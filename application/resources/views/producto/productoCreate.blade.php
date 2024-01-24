@extends("layout.layout")
@section("head")
    @include("parciales.head")
@endsection
@section("main")
<main>
    <h1>Añadir producto</h1>
    <form action="http://localhost/" method="POST" enctype="multipart/form-data">
        <div>
            <label for="categoria_id">Categoría</label>
            <select id="categoria_id" name="categoria_id">
                <option selected disabled>Elige una categoría</option>
                <option value="1">Bebidas</option>
            </select>
        </div>

        <div>
            <label for="nombre">Nombre</label>
            <input id="nombre" name="nombre" minlength="2" maxlength="45">
        </div>

        <div>
            <label for="descripcion">Descripción</label>
            <textarea id="descripcion" name="descripcion"></textarea>
        </div>

        <div>
            <label for="Imagen"></label>
            <input type="file">
        </div>
        <button>Agregar producto</button>
    </form>
</main>
@endsection
