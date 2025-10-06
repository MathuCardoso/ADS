#include <stdio.h>
int main()
{

    int l1, l2, l3, triangulo;

    printf("Digite o primeiro lado de um triangulo: ");
    scanf("%d", &l1);

    printf("Digite o segundo lado de um triangulo: ");
    scanf("%d", &l2);

    printf("Digite o terceiro lado de um triangulo: ");
    scanf("%d", &l3);

    if((l1 + l2) >= l3 && (l1 + l3) >= l2 && (l2 + l3) >= l1) {
        triangulo = 1;
        printf("Os lados podem formar um triangulo.\n");

        if (triangulo == 1 && l1 == l2 && l2 == l3) {
            printf("Este triangulo e Equilatero\n");
        } else if(triangulo == 1 && (l1 == l2 || l1 == l3 || l2 == l3)) {
            printf("Este triangulo e Isoceles\n");
        } else {
            printf("Este e um triangulo Escaleno\n");
        }

    } else {
        triangulo = 0;
        printf("Os lados não podem formar um triangulo.\n");
    }

    
    
    return 0;
}
