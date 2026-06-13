@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow border-0">
            <div class="card-header bg-dark text-white fw-bold">➕ Registrar Selección del Mundial</div>
            <div class="card-body p-4">

                <form action="{{ route('equipos.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-bold">Selecciona el País</label>
                        <select name="preset_team" class="form-select" required>
                            <option value="" disabled selected>Selecciona un país...</option>
                            <option value="Alemania|de">Alemania</option>
                            <option value="Arabia Saudí|sa">Arabia Saudí</option>
                            <option value="Argelia|dz">Argelia</option>
                            <option value="Argentina|ar">Argentina</option>
                            <option value="Australia|au">Australia</option>
                            <option value="Austria|at">Austria</option>
                            <option value="Bélgica|be">Bélgica</option>
                            <option value="Bosnia y Herzegovina|ba">Bosnia y Herzegovina</option>
                            <option value="Brasil|br">Brasil</option>
                            <option value="Cabo Verde|cv">Cabo Verde</option>
                            <option value="Canadá|ca">Canadá</option>
                            <option value="Catar|qa">Catar</option>
                            <option value="Chequia|cz">Chequia</option>
                            <option value="Colombia|co">Colombia</option>
                            <option value="Corea del Sur|kr">Corea del Sur</option>
                            <option value="Costa de Marfil|ci">Costa de Marfil</option>
                            <option value="Croacia|hr">Croacia</option>
                            <option value="Curazao|cw">Curazao</option>
                            <option value="Ecuador|ec">Ecuador</option>
                            <option value="Egipto|eg">Egipto</option>
                            <option value="Escocia|gb-sct">Escocia</option>
                            <option value="España|es">España</option>
                            <option value="Estados Unidos|us">Estados Unidos</option>
                            <option value="Francia|fr">Francia</option>
                            <option value="Ghana|gh">Ghana</option>
                            <option value="Haití|ht">Haití</option>
                            <option value="Inglaterra|gb-eng">Inglaterra</option>
                            <option value="Irak|iq">Irak</option>
                            <option value="Irán|ir">Irán</option>
                            <option value="Japón|jp">Japón</option>
                            <option value="Jordania|jo">Jordania</option>
                            <option value="Marruecos|ma">Marruecos</option>
                            <option value="México|mx">México</option>
                            <option value="Noruega|no">Noruega</option>
                            <option value="Nueva Zelanda|nz">Nueva Zelanda</option>
                            <option value="Países Bajos|nl">Países Bajos</option>
                            <option value="Panamá|pa">Panamá</option>
                            <option value="Paraguay|py">Paraguay</option>
                            <option value="Portugal|pt">Portugal</option>
                            <option value="República Democrática del Congo|cd">República Democrática del Congo</option>
                            <option value="Senegal|sn">Senegal</option>
                            <option value="Sudáfrica|za">Sudáfrica</option>
                            <option value="Suecia|se">Suecia</option>
                            <option value="Suiza|ch">Suiza</option>
                            <option value="Túnez|tn">Túnez</option>
                            <option value="Türkiye|tr">Türkiye</option>
                            <option value="Uruguay|uy">Uruguay</option>
                            <option value="Uzbekistán|uz">Uzbekistán</option>
                        </select>
                        @error('preset_team') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Asignar Grupo</label>
                        <select name="grupo" class="form-select" required>
                            <option value="" disabled selected>Selecciona el grupo...</option>
                            @foreach(range('A', 'L') as $letra)
                                <option value="{{ $letra }}">Grupo {{ $letra }}</option>
                            @endforeach
                        </select>
                        @error('grupo') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('equipos.index') }}" class="btn btn-light border">Cancelar</a>
                        <button type="submit" class="btn btn-primary px-4 fw-bold">🚀 Guardar Selección</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection