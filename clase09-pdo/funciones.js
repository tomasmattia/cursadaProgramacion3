var Test;
(function (Test) {
    var Validadora = /** @class */ (function () {
        function Validadora() {
        }
        Validadora.TomarMetodo = function (valor) {
            console.log(valor);
            document.getElementById('formulario').method = valor;
        };
        return Validadora;
    }());
    Test.Validadora = Validadora;
})(Test || (Test = {}));
