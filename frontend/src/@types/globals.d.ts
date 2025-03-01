export declare global {
  interface IRoute {
    path: string
    element: React.ReactElement
  }

  interface IEntity {
    id: number
    createdAt: Date
    updatedAt: Date
  }

  interface ISchool extends IEntity {
    name: string
    cnpj: string
    address: string
    email: string
    phone?: string
    accountId: number
  }

  interface IClass extends IEntity {
    name: string
    shift: 'MORNING' | 'AFTERNOON' | 'EVENING' | 'NIGHT'
    academicYear: string
    accountId: number
    schoolId: number
  }

  interface IActivity extends IEntity {
    title: string
    description: string
    maxScore: number
    dueDate: string
    accountId: number
    classId: number
  }

  type ICreateSchoolData = {
    name: string
    cnpj: string
    address: string
    email: string
    phone?: string
  }

  type IUpdateSchoolData = Partial<ICreateSchoolData>

  type ICreateClassData = {
    name: string
    shift: 'MORNING' | 'AFTERNOON' | 'EVENING' | 'NIGHT'
    academicYear: string
  }

  type IUpdateClassData = Partial<ICreateClassData>
}
