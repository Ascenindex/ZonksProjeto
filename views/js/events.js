export function activeLink() {
    list.forEach((item) => {
        item.classList.remove("hovered");
    });
    this.classList.add("hovered");
}

export function showRegister() {
    const element = document.getElementById('add-box');
    element.classList.remove('hidden', 'fade-out');
    element.classList.add('fade-in');
    element.style.display = 'block';
}

export function hideRegister() {
    const element = document.getElementById('add-box');
    element.classList.remove('fade-in');
    element.classList.add('fade-out');
    setTimeout(() => {
        element.classList.add('hidden');
        element.style.display = 'none';
    }, 500);
}

export function showEmpresa() {
    const element = document.getElementById('empresa-box');
    element.classList.remove('hidden', 'fade-out');
    element.classList.add('fade-in');
    element.style.display = 'block';
}

export function hideEmpresa() {
    const element = document.getElementById('empresa-box');
    element.classList.remove('fade-in');
    element.classList.add('fade-out');
    setTimeout(() => {
        element.classList.add('hidden');
        element.style.display = 'none';
    }, 500);
}

export function showProduto() {
    const element = document.getElementById('produto-box');
    element.classList.remove('hidden', 'fade-out');
    element.classList.add('fade-in');
    element.style.display = 'block';
}

export function hideProduto() {
    const element = document.getElementById('produto-box');
    element.classList.remove('fade-in');
    element.classList.add('fade-out');
    setTimeout(() => {
        element.classList.add('hidden');
        element.style.display = 'none';
    }, 500);
}

export function showUpdate(id, nome, numero, email, empresa, produto) {
    const element = document.getElementById('update-box');
    document.getElementById('update-id').value = id;
    document.getElementById('update-nome').value = nome;
    document.getElementById('update-numero').value = numero;
    document.getElementById('update-email').value = email;
    document.getElementById('empresa').value = empresa;
    document.getElementById('update-produto').value = produto;
    element.classList.remove('hidden', 'fade-out');
    element.classList.add('fade-in');
    element.style.display = 'block';
}

export function hideUpdate() {
    const element = document.getElementById('update-box');
    element.classList.remove('fade-in');
    element.classList.add('fade-out');
    setTimeout(() => {
        element.classList.add('hidden');
        element.style.display = 'none';
    }, 500);
}

export function confirmDelete() {
    return confirm('Tem certeza que deseja deletar?');
}

export function formatarNumero() {
    var numero = document.getElementById('numeroDeTelefone');
    var valor = numero.value.replace(/\D/g, '');
    if (valor.length > 0) {
        valor = valor.replace(/^(\d{2})(\d)/g, '$1-$2');
        valor = valor.replace(/(\d{5})(\d)/, '$1-$2');
    }
    numero.value = valor;
}

export function formatarNumeroUpdate() {
    var numero = document.getElementById('update-numero');
    var valor = numero.value.replace(/\D/g, '');
    if (valor.length > 0) {
        valor = valor.replace(/^(\d{2})(\d)/g, '$1-$2');
        valor = valor.replace(/(\d{5})(\d)/, '$1-$2');
    }
    numero.value = valor;
}

// Add toggle function for navigation
export function toggleClick() {
    let toggle = document.querySelector(".toggle");
    let navigation = document.querySelector(".navigation");
    let main = document.querySelector(".main");

    toggle.onclick = function () {
        navigation.classList.toggle("active");
        main.classList.toggle("active");
    };
}
