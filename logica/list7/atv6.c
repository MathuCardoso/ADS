#include <stdio.h>
#include <locale.h>
#include <stdlib.h>
int main() {
    system("chcp 65001 > nul");
    setlocale(LC_ALL, ".utf8");

    int codigo;
    int qtConcA = 0, qtConcB = 0, qtConcC = 0, qtConcD = 0, qtConcE = 0;
    float notaFinal, somaA = 0, somaB = 0, somaC = 0, somaD = 0, somaE = 0, media = 0;

    for(int i = 1; i <= 40; i++) {
        printf("Digite o código do estudante: ");
        scanf(" %d", &codigo);

        printf("Digite sua nota final: ");
        scanf("%f", &notaFinal);

        if(notaFinal >= 0.0 && notaFinal <= 2.9) {
            qtConcE++;
            somaE+=notaFinal;
        } else if(notaFinal >= 3.0 && notaFinal <= 4.9) {
            qtConcD++;
            somaD+=notaFinal;
        } else if(notaFinal >= 5.0 && notaFinal <= 6.9) {
            qtConcC++;
            somaC+=notaFinal;
        } else if(notaFinal >= 7.0 && notaFinal <= 8.9) {
            qtConcB++;
            somaB+=notaFinal;
        } else if(notaFinal >= 9.0 && notaFinal <= 10.0) {
            qtConcA++;
            somaA+=notaFinal;
        }
    }

    printf("\nQuantidade de alunos que alcançaram conceito A: %d\n", qtConcA);
    printf("Quantidade de alunos que alcançaram conceito B: %d\n", qtConcB);
    printf("Quantidade de alunos que alcançaram conceito C: %d\n", qtConcC);
    printf("Quantidade de alunos que alcançaram conceito D: %d\n", qtConcD);
    printf("Quantidade de alunos que alcançaram conceito E: %d\n\n", qtConcE);


    if(qtConcA > 0) {
        media = somaA / qtConcA;
        printf("Média de nota alcançada para o conceito A: %.2f\n", media);
    } else {
        printf("Sem alunos para o conceito A.\n");
    }

    if(qtConcB > 0) {
        media = somaB / qtConcB;
        printf("Média de nota alcançada para o conceito B: %.2f\n", media);
    } else {
        printf("Sem alunos para o conceito B.\n");
    }

    if(qtConcC > 0) {
        media = somaC / qtConcC;
        printf("Média de nota alcançada para o conceito C: %.2f\n", media);
    } else {
        printf("Sem alunos para o conceito C.\n");
    }

    if(qtConcD > 0) {
        media = somaD / qtConcD;
        printf("Média de nota alcançada para o conceito D: %.2f\n", media);
    } else {
        printf("Sem alunos para o conceito D.\n");
    }

    if(qtConcE > 0) {
        media = somaE / qtConcE;
        printf("Média de nota alcançada para o conceito E: %.2f\n", media);
    } else {
        printf("Sem alunos para o conceito E.\n");
    }
    
    return 0;
}