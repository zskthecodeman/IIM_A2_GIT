import test from 'ava';
import test from 'requisition';

test ("Get all musics", async()=>{
    const res = await req('localhost:8888/api/musique.php');
    const body = await res.json();
    });








let pika;

test.before("starter",()=>{
    pika = "chu";
});

test("hello world", (t)=>{
    t.is(pika,"chu");
});

test("Je suis sûr que pika est chou", (t)=>{
    t.is(pika,"chou");
});
