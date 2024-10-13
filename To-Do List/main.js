var lista=[];

function inserisci(elemento){
    lista.push(elemento);
    refresh();
    
    

    
    
}
function remove(i){
    lista.splice(i,1);
    
    refresh();

}
function refresh(){
    document.getElementById('test').innerHTML='';
    let i=1;
    lista.forEach((element,index) => {
        
        const div=document.createElement('div');
        div.className='principale';
        const p1=document.createElement('p');
        const p2=document.createElement('p');
        const text=document.createTextNode(i+"."+element);
        p1.append(text);

        const button=document.createElement('button');
        button.textContent="Delete "+i;
        button.addEventListener('click',function(){
            remove(index)});
        p2.append(button);
        div.append(p1);
        div.append(p2);
        document.getElementById("test").appendChild(div);
        i++;
    });
}