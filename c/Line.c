#include "stdio.h"

#define OK 1
#define ERROR 0
#define TRUE 1
#define FALSE 0

#define MAXSIZE 20    /* 存储空间初始分配量 */

typedef int ElemType; /* ElemType类型根据实际情况而定，这里假设为int */
typedef int Status;   /* Status是函数的类型,其值是函数结果状态代码，如OK等 */

typedef struct
{
    ElemType data[MAXSIZE]; /* 数组，存储数据元素 */
    int length;             /* 线性表当前长度 */
}SqlList;

/* 初始化顺序线性表 */
Status InitList(SqlList *L)
{
    L->length = 0;
    return OK;
}

int main()
{
    SqlList L;
    ElemType e;
    Status i;

    i = InitList(&L);
    printf("初始化L后：L.length=%d\n",L.length);
}