@extends('layouts.admin')

@section('content')
<section class="d-flex">

    <div class="container p-5 ">
        <div class="home">

            <h1 class="mt-2 my-4">

            </h1>



            <a href="{{ route('admin.restaurants.create') }}" class="btn btn-primary mt-2 ">Aggiungi il tuo ristorante</a>

            <p class="paragraph my-4">
                Benvenuti su Deliveboo, il sito ideale per gestire i tuoi ristoranti e piatti in modo facile ed efficiente.
                Con Deliveboo, hai il controllo completo sulla tua attività culinaria.
                <br>
                La nostra piattaforma intuitiva ti consente di aggiungere nuovi ristoranti con tutte le informazioni
                essenziali come nome, indirizzo e immagine. Puoi facilmente modificare queste informazioni in qualsiasi
                momento per tenerle sempre aggiornate.

                <br>
                Non solo puoi gestire i tuoi ristoranti, ma puoi anche gestire i tuoi piatti con estrema semplicità.
                Aggiungi nuovi piatti con i loro nomi invitanti, prezzi competitivi e immagini allettanti. Inoltre, hai la
                flessibilità di modificare o eliminare i piatti esistenti per adattarti alle esigenze e ai gusti dei tuoi
                clienti.
                <br>

                Deliveboo ti offre il potere di creare una lista di ristoranti e piatti che catturano l'attenzione dei tuoi
                clienti. Raggiungi un pubblico più vasto, offri un'esperienza culinaria unica e fai crescere il tuo business
                gastronomico con facilità grazie a Deliveboo.
                <br>

                Inizia oggi stesso a sfruttare la potenza di Deliveboo per gestire, modificare ed eliminare i tuoi
                ristoranti e piatti con la massima semplicità e efficienza. Il successo culinario è a portata di mano con
                Deliveboo!
            </p>



        </div>
    </div>

</section>
@endsection
