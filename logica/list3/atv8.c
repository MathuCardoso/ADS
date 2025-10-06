#include <ctype.h>
#include <stdio.h>
int main()
{
    char gen;
    float peso, altura, imc;

    printf("Digite o genero de uma pessoa [H, M]\n");
    scanf("%c", &gen);
    gen = toupper(gen);

    while (gen != 'H' && gen != 'M')
    {
        printf("Entrada invalida. Digite o genero de uma pessoa [H, M]\n");
        scanf(" %c", &gen);   
        gen = toupper(gen);
    }

    printf("Digite o peso de uma pessoa em quilos. Ex: 60.5\n");
    scanf("%f", &peso);

    printf("Digite a altura de uma pessoa em metros. Ex: 1.66\n");
    scanf("%f", &altura);

    imc = peso / (altura * altura);

    if (gen == 'm' ) {
        
        if(imc < 19){
            printf("Pessoa abaixo do peso.");
        } else if(imc >= 19 && imc <= 23.9) {
            printf("Pessoa com peso normal para sua altura.");
        } else if(imc >= 24 && imc <= 28.9) {
            printf("Pessoa com obesidade leve.");
        } else if(imc >= 29 && imc <= 38.9) {
            printf("Pessoa com obesidade moderada.");
        } else if(imc > 39) {
            printf("Pessoa com obesidade morbida.");
        }
    } else if(gen == 'h') {

        if(imc < 20){
            printf("Pessoa abaixo do peso.");
        } else if(imc >= 20 && imc <= 24.9) {
            printf("Pessoa com peso normal para sua altura.");
        } else if(imc >= 25 && imc <= 29.9) {
            printf("Pessoa com obesidade leve.");
        } else if(imc >= 30 && imc <= 39.9) {
            printf("Pessoa com obesidade moderada.");
        } else if(imc > 40) {
            printf("Pessoa com obesidade morbida.");
        }
    }
    

    return 0;
}
