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
  interface IUser extends IEntity {
    name: string
    email: string
    image: Blob
    role: 'ADMINISTRATOR' | 'COORDINATOR' | 'MONITOR' | 'STUDENT'
    role_id: number
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

  type LoginRequest = {
    email: string
    password: string
  }
  type LoginResponse = {
    status: string
    token: string
    name: string
    user: IUser
  }
}
