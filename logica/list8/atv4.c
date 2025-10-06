#include <stdio.h>
#include <locale.h>
#include <stdlib.h>
int main() {
    system("chcp 65001 > nul");
    setlocale(LC_ALL, ".utf8");

    int i = 0, qtAlunos = 0;
    float notas[20], media = 0, soma = 0;

    for(; i < 20; i++) {
        printf("\nDigite a nota do aluno %d: ", i + 1);
        scanf("%f", &notas[i]);

        soma+=notas[i];
    }

    media = soma / i;

    for(i = 0; i < 20; i++) {
        if(notas[i] > media) {
            qtAlunos++;
        }
    }

    printf("\nEsta é a média da turma: %.2f\n", media);
    printf("%d alunos conseguiram uma média maior que %.2f", qtAlunos, media);

    
    return 0;
}